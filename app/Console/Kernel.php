<?php

namespace App\Console;

use App\Console\Commands\YourRentalEvaluationReady;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Property\Console\Commands\PropertyReport;

/**
 * Class Kernel.
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        PropertyReport::class,
        YourRentalEvaluationReady::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('activitylog:clean')->daily();
        $schedule->command('property:report')->dailyAt('23:55')->withoutOverlapping();

        // $schedule->command('owner:setupowner')->everyFiveMinutes()->withoutOverlapping();
        // $schedule->command('owner:welcome')->dailyAt(18)->withoutOverlapping();
        // $schedule->command('owner:insurance')->dailyAt(18)->withoutOverlapping();
        // $schedule->command('owner:survey')->dailyAt(18)->withoutOverlapping();
        // $schedule->command('owner:reffer')->dailyAt(18)->withoutOverlapping();

        // $schedule->command('tenant:showing_date_first')->dailyAt(8)->withoutOverlapping();
        // $schedule->command('tenant:showing_date_second')->everyFiveMinutes()->withoutOverlapping();
        // $schedule->command('tenant:showing_follow_up')->twiceDaily(18, 20)->withoutOverlapping();
        // $schedule->command('tenant:showing_survey')->twiceDaily(18, 20)->withoutOverlapping();

        // $schedule->command('get_quote:service_info_package')->everyFiveMinutes('00:10')->withoutOverlapping();
        // $schedule->command('get_quote:service_info_package_whistler')->everyFiveMinutes('00:10')->withoutOverlapping();
        // $schedule->command('get_quote:engagement_email1')->weekdays()->dailyAt(8)->withoutOverlapping();
        // $schedule->command('get_quote:engagement_email2')->weekdays()->dailyAt(15)->withoutOverlapping();
        // $schedule->command('get_quote:consult_request')->weekdays()->dailyAt('12:15')->withoutOverlapping();

        $schedule->command('owner:yourrentalevaluationready')->weekdays()->everyMinute()->between('8:00', '17:00')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
