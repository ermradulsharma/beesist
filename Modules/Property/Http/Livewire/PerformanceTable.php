<?php

namespace Modules\Property\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyReport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class PerformanceTable extends DataTableComponent
{
    protected $model = Property::class;

    public $loggedId;

    public $accountId;

    public $agentId;

    public $status;

    public $dateRange;

    public $property;

    public $propertyId;

    public function mount($loggedId, $accountId = null, $agentId = null, $status = null, $dateRange = null)
    {
        $this->loggedId = $loggedId;
        $this->accountId = $accountId;
        $this->agentId = $agentId;
        $this->status = $status;
        $this->dateRange = $dateRange;
    }

    public function sendReport($id)
    {
        $this->property = Property::with('propertyReports')->find($id);
        $this->propertyId = $id;
        $this->dispatch('sendReportModal', $this->property);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Prop Id'), 'property_id')->hideIf(true),
            Column::make('Actions')->label(function ($row) {
                $buttons = json_encode($row);
                if ($row->property) {
                    $sendReport = '<a href="javascript:void(0)" data-toggle="tooltip" title="Send Report" wire:click="sendReport('.$row->property->id.')" class="btn btn-success p-1 mr-1 d-flex align-items-center"><i class="fas fa-paper-plane m-0" style="font-size: 11px;"></i></a>';
                    $viewUrl = route('property.single', ['property' => $row->property->slug]);
                    $viewUrl = route(rolebased().'.properties.sentPerformanceReport', ['pId' => $row->property->id]);
                    $historyButton = '<a target="_blank" href="'.$viewUrl.'" data-toggle="tooltip" title="Report History" class="btn btn-warning p-1 mr-1 d-flex align-items-center"><i class="fas fa-list m-0" style="font-size: 11px; color: #ffffff"></i></a>';
                    $viewButton = '<a target="_blank" href="'.$viewUrl.'" data-toggle="tooltip" title="View Property" class="btn btn-primary p-1 mr-1 d-flex align-items-center"><i class="fas fa-eye m-0" style="font-size: 11px;"></i></a>';
                    $buttons = $sendReport.$historyButton.$viewButton;
                }

                return '<div class="d-flex align-items-center">'.$buttons.'</div>';

            })->html(),
            Column::make(__('ID'), 'id')->collapseAlways(),
            Column::make(__('P. ID'), 'property.id')->collapseAlways(),
            ImageColumn::make(__('Image'))->location(function ($row) {
                return $row->property ? $row->property->image : '';
            })->attributes(fn ($row) => ['class' => 'rounded-full', 'alt' => $row->property_id, 'width' => 40]),
            Column::make(__('Title'), 'property.title'),
            Column::make(__('Slug'), 'property.slug')->hideIf(true),

            Column::make('Rental Apps')->label(fn ($row) => $row->total_rental_applications),
            Column::make('Tenancy Apps')->label(fn ($row) => $row->total_tenancy_agreements),
            Column::make('Showings')->label(fn ($row) => $row->total_showings),
            Column::make('Showing Request')->label(fn ($row) => $row->total_showing_requests),
            Column::make('Showing Attended')->label(fn ($row) => $row->total_people_attended),
            Column::make('Asked Question')->label(fn ($row) => $row->total_asked_questions),
            Column::make('Days on market')->label(fn ($row) => $row->total_days_on_market),
            Column::make('Views')->label(fn ($row) => $row->total_views),
            Column::make('Inspections')->label(fn ($row) => $row->total_inspections),

            Column::make(__('City & Area'), 'property.city')->collapseAlways(),
            Column::make(__('Beds'), 'property.beds')->collapseAlways(),
            Column::make(__('Baths'), 'property.baths')->collapseAlways(),
            Column::make(__('Sqft'), 'property.area')->collapseAlways(),
            Column::make(__('Pet Friendly'), 'property.pet_policy')->collapseAlways(),
            Column::make(__('Parking'), 'property.parking')->collapseAlways(),
            Column::make(__('In suite laundry'), 'property.in_suite_laudry')->collapseAlways(),
            Column::make(__('Current Rental Rate'), 'property.rate')->collapseAlways(),
            DateColumn::make('Last Rate Change', 'property.last_rate_change')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y')->collapseAlways(),
            Column::make('Last Report Sent On')->label(function ($row) {
                return $row->property ? $row->property->last_report_sent : '';
            })->collapseAlways(),
            // Column::make(__('Comparable Listings'), 'comparable_listings'),
            Column::make(__('Craigslist'), 'property.craigslist')->collapseAlways(),
            Column::make(__('Rentboard'), 'property.rentboard')->collapseAlways(),
            Column::make(__('FB'), 'property.fb')->collapseAlways(),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        $properties = PropertyReport::query()
            ->select('agent_id', 'property_status',
                \DB::raw('SUM(property_reports.rental_applications) as total_rental_applications'),
                \DB::raw('SUM(property_reports.tenancy_agreements) as total_tenancy_agreements'),
                \DB::raw('SUM(property_reports.showings) as total_showings'),
                \DB::raw('SUM(property_reports.showing_requests) as total_showing_requests'),
                \DB::raw('SUM(property_reports.people_attended) as total_people_attended'),
                \DB::raw('SUM(property_reports.asked_questions) as total_asked_questions'),
                \DB::raw('SUM(property_reports.days_on_market) as total_days_on_market'),
                \DB::raw('SUM(property_reports.views) as total_views'),
                \DB::raw('SUM(property_reports.inspections) as total_inspections')
            )
            ->with('property')
            ->groupBy('property_id');

        if ($this->loggedId) {
            if ($user->hasManagerAccess()) {
                $entityIds = UserEntity::where(['entity_key' => 'property', 'account_id' => $this->loggedId])->pluck('entity_value');
                $properties->whereIn('property_id', $entityIds);

                if ($this->status) {
                    $properties->where('property_status', $this->status);
                }
                if ($this->dateRange) {
                    $dates = explode(' - ', $this->dateRange);
                    $startDate = Carbon::parse($dates[0])->startOfDay();
                    $endDate = Carbon::parse($dates[1])->endOfDay();
                    $properties->whereBetween('property_reports.created_at', [$startDate, $endDate]);
                } else {
                    $properties->whereBetween('property_reports.created_at', [Carbon::now()->subDays(6), Carbon::now()]);
                }
                if ($this->agentId) {
                    $properties->whereIn('agent_id', $this->agentId);
                }
            } elseif ($user->hasAllAccess()) {
                $entitiesQuery = UserEntity::where(['entity_key' => 'property']);
                if ($this->accountId) {
                    $entityIds = $entitiesQuery->where(['account_id' => $this->accountId])->pluck('entity_value');
                    $properties->whereIn('property_id', $entityIds);
                }
                if ($this->status) {
                    $properties->where('property_status', $this->status);
                }
                if ($this->dateRange) {
                    $dates = explode(' - ', $this->dateRange);
                    $startDate = Carbon::parse($dates[0])->startOfDay();
                    $endDate = Carbon::parse($dates[1])->endOfDay();
                    $properties->whereBetween('property_reports.created_at', [$startDate, $endDate]);
                } else {
                    $properties->whereBetween('property_reports.created_at', [Carbon::now()->subDays(6), Carbon::now()]);
                }
                if ($this->agentId) {
                    $properties->whereIn('agent_id', $this->agentId);
                }

            }
        }

        return $properties->whereHas('property', function ($q) {
            $q->where('status', 1);
        });
    }
}
