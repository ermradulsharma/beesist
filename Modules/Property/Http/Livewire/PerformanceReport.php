<?php

namespace Modules\Property\Http\Livewire;

use App\Domains\Auth\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyReport;

class PerformanceReport extends Component
{
    public $accountId;

    public $agentId;

    public $status;

    public $filteredProperties = [];

    public $dateRange;

    public $data = [];

    public function mount($accountId = null, $agentId = null, $status = null, $dateRange = null)
    {
        $this->accountId = $accountId;
        $this->agentId = $agentId;
        $this->status = $status;
        $this->dateRange = $dateRange;
    }

    public function render()
    {
        $user = Auth::user();
        $subscribers = Subscription::where('stripe_status', 'active')->get();
        $agents = [];
        if ($user->isManager()) {
            $agent_ids = UserEntity::where('entity_key', 'Agent')->where('account_id', $user->id)->pluck('entity_value');
            $agents = User::whereIn('id', $agent_ids)->onlyActive()->select(['id', 'first_name', 'last_name', 'name'])->get();
        }
        $statuses = ['For Rent', 'For Sale', 'Furnished', 'Luxurious', 'Rented', 'Just Rented', 'Sold', 'Vacation Rental'];
        $new_listings = 0;
        $forRentCount = 0;
        $rentedCount = 0;
        $showings = 0;
        $applications = 0;
        $inspections = 0;

        $user = Auth::user();
        $properties = Property::query();
        if ($user->hasAllAccess()) {
            if ($this->accountId) {
                $entityIds = UserEntity::where(['account_id' => $this->accountId, 'entity_key' => 'property'])->pluck('entity_value');
                $properties->whereIn('id', $entityIds);
            }
        } elseif ($user->isManager()) {
            $entityIds = UserEntity::where(['account_id' => $user->id, 'entity_key' => 'property'])->pluck('entity_value');
            $properties->whereIn('id', $entityIds);
        } elseif ($user->hasAgentAccess()) {
            $properties->where('prop_agents', Auth::id());
        }

        if ($this->agentId) {
            $properties->where('prop_agents', $this->agentId);
        }
        /*if ($this->status) {
            $properties->whereRaw('FIND_IN_SET(?, prop_status) > 0', [$this->status]);
        }*/
        $property_ids = $properties->pluck('id');
        $property_reports = PropertyReport::whereIn('property_id', $property_ids);

        $property_report_data = PropertyReport::whereIn('property_id', $property_ids)->select(
            \DB::raw('SUM(property_reports.rental_applications) as total_rental_applications'),
            \DB::raw('SUM(property_reports.tenancy_agreements) as total_tenancy_agreements'),
            \DB::raw('SUM(property_reports.showings) as total_showings'),
            \DB::raw('SUM(property_reports.showing_requests) as total_showing_requests'),
            \DB::raw('SUM(property_reports.people_attended) as total_people_attended'),
            \DB::raw('SUM(property_reports.asked_questions) as total_asked_questions'),
            \DB::raw('SUM(property_reports.days_on_market) as total_days_on_market'),
            \DB::raw('SUM(property_reports.views) as total_views'),
            \DB::raw('SUM(property_reports.inspections) as total_inspections')
        );

        if ($this->dateRange) {
            $dates = explode(' - ', $this->dateRange);
            $startDate = Carbon::parse($dates[0])->startOfDay();
            $endDate = Carbon::parse($dates[1])->endOfDay();
            $properties->whereBetween('created_at', [$startDate, $endDate]);
            $new_listings = $properties->count();
            $property_reports->whereBetween('created_at', [$startDate, $endDate]);
            $property_report_data->whereBetween('created_at', [$startDate, $endDate]);
        }
        //$properties = $properties->get();
        $propertyReport_result = $property_reports->get();
        $rentedCount = $propertyReport_result->where('property_status', 'Rented')->groupBy('property_id')->count();
        $forRentCount = $propertyReport_result->where('property_status', 'For Rent')->groupBy('property_id')->count();
        $prop_reports_data = $property_report_data->first();
        $this->data = [
            'new' => $new_listings,
            'forRent' => $forRentCount,
            'rented' => $rentedCount,
            'showing' => $prop_reports_data->total_showings,
            'applications' => $prop_reports_data->total_showing_requests,
            'inspections' => $prop_reports_data->total_inspections,
        ];

        return view('property::livewire.performance-report', compact('subscribers', 'agents', 'statuses'));
    }
}
