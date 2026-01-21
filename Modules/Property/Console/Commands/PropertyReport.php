<?php

namespace Modules\Property\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Leads\Entities\Appointment;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyQuestion;
use Modules\Property\Entities\PropertyReport as EntitiesPropertyReport;
use Modules\Property\Entities\PropertyShowing;
use Modules\RentalApplication\Entities\RentalApplication;
use Modules\Tenant\Entities\TenantAgreement;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class PropertyReport extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'property:report';

    /**
     * The console command description.
     */
    protected $description = 'Property performance update.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $properties = Property::where('status', '1')->whereNotNull('prop_status')->get();

        $today1 = Carbon::now()->format('Y-m-d');
        $today2 = Carbon::now()->format('Y/m/d');
        foreach ($properties as $property) {
            $status = null;
            if ($property->prop_status && in_array('For Rent', explode(',', $property->prop_status))) {
                $status = 'For Rent';
            } elseif ($property->prop_status && in_array('Rented', explode(',', $property->prop_status))) {
                $status = 'Rented';
            }
            $inspections = Appointment::where('type', 'Inspection')->where('status', 1)->where('property_id', $property->id)->whereDate('created_at', $today1)->count();
            $showings = PropertyShowing::where('prop_id', $property->id)->whereDate('showing_date', $today2)->count();
            $rental_applications = RentalApplication::where('prop_id', $property->id)->whereDate('created_at', $today1)->count();
            $asked_questions = PropertyQuestion::where('property_id', $property->id)->whereDate('created_at', $today1)->count();
            $tenancy_agreements = TenantAgreement::where('prop_id', $property->id)->whereDate('created_at', $today1)->count();
            $ShowingApplications = PropertyShowing::withCount('showing_applications')->where('prop_id', $property->id)->whereDate('showing_date', $today2)->get();
            $sa_count = 0;
            foreach ($ShowingApplications as $ShowingApplication) {
                $sa_count += $ShowingApplication->showing_applications_count;
            }
            $ShowingApplications_att = PropertyShowing::withCount('showing_applications')->where('prop_id', $property->id)->where('status', '1')->whereDate('showing_date', $today2)->get();
            $sa_att_count = 0;
            foreach ($ShowingApplications_att as $ShowingApplication_att) {
                $sa_att_count += $ShowingApplication_att->showing_applications_count;
            }

            EntitiesPropertyReport::create([
                'property_id' => $property->id,
                'agent_id' => $property->prop_agents,
                'property_status' => $status,
                'rental_applications' => $rental_applications,
                'tenancy_agreements' => $tenancy_agreements,
                'showings' => $showings,
                'showing_requests' => $sa_count,
                'people_attended' => $sa_att_count,
                'asked_questions' => $asked_questions,
                'days_on_market' => $status === 'For Rent' ? 1 : 0,
                'views' => $property->daily_views,
                'inspections' => $inspections,
                'status_changed_at' => $property->status_changed_on ? $property->status_changed_on : $property->created_at,
            ]);
        }
        Property::where('status', '1')->whereNotNull('prop_status')->update(['daily_views' => 0]);
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
