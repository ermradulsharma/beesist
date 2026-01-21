<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Property\Entities\ShowingApplication;
use Modules\Cms\Entities\Page;
use App\Mail\ShowingNotification;
use Illuminate\Support\Facades\Mail;

class ShowingNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'showing:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'showing notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $showingapplications = ShowingApplication::whereHas('prop_showing', function ($q) {
            $q->where('status', '"1"');
        })->whereDate('showing_date', '>=', Carbon::now())->get();
        $email_data = Page::where('type', 'email')->where('name', 'PROPERTY INFO')->select('content')->first();
        foreach ($showingapplications as $showingapplication) {
            $content = str_replace("[FIRST_NAME]", $showingapplication->first_name, $email_data->content);
            Mail::to('abaanoutsourcing@gmail.com')->send(new ShowingNotification($showingapplication, $content));
        }
    }
}
