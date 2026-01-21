<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Property\Entities\ShowingApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShowingNotification;
use App\Notification;

class ShowingSurvey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:showing_survey';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TENANT AFTER SHOWING SURVEY';

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
        $showings = ShowingApplication::with('user', 'property', 'agent')->select('id', 'showing_id', 'property_id', 'agent_id', 'tenant_id', 'showing_date', 'status', 'created_at')->where('notify_status', '3')->whereHas('prop_showing', function ($q) {
            $q->where('status', '1');
        })->whereBetween('showing_date', [Carbon::today()->format('Y/m/d H:i'), Carbon::now()->subMinutes(55)->format('Y/m/d H:i')])->get();
        $email_data = EmailTemplate::where('title', 'SHOWING SURVEY')->first();
        if ($email_data->status == '1') {
            $additional = ShowingApplication::with('user', 'property', 'agent')->select('id', 'showing_id', 'property_id', 'agent_id', 'tenant_id', 'showing_date', 'status', 'created_at')->whereIn('tenant_id', explode(',', $email_data->other_reciepients))->with('user')->get();
            $showings = $showings->merge($additional);
            foreach ($showings as $showing) {
                $content = str_replace("[FIRST_NAME]", extract_name($showing->user->name)['first_name'], $email_data->content);
                $content = str_replace("[LAST_NAME]", extract_name($showing->user->name)['last_name'], $content);
                $content = str_replace("[EMAIL]", $showing->user->email, $content);
                $content = str_replace("[PROPERTY_ADDRESS]", $showing->property->address, $content);
                $content = str_replace("[SHOWING_TIME]", $showing->showing_date, $content);
                $content = str_replace("[AGENT_PHONE]", $showing->agent->phone, $content);
                $content = str_replace("../..", url('/'), $content);

                Mail::to($showing->user->email)->send(new ShowingNotification($showing, $content, $email_data->subject));
                Notification::updateOrCreate(['user_id' => $showing->tenant_id, 'form_id' => $showing->id, 'template' => $email_data->title], ['user_id' => $showing->tenant_id, 'form_id' => $showing->id, 'template' => $email_data->title, 'status' => '1']);

                EmailTemplate::find($email_data->id)->update(['other_reciepients' => '']);
                ShowingApplication::find($showing->id)->update(['notify_status' => 4]);
            }
        }
    }
}
