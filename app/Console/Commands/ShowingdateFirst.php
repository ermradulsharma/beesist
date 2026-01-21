<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Property\Entities\ShowingApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShowingNotification;
use App\Models\Notification;

class ShowingdateFirst extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:showing_date_first';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TENANT SHOWING DATE 8:00 AM';

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
        $showings = ShowingApplication::with('user', 'property', 'agent')->select('id', 'showing_id', 'property_id', 'agent_id', 'tenant_id', 'showing_date', 'status', 'created_at')->where('notify_status', '0')->whereDate('showing_date', Carbon::now()->format('Y/m/d'))->whereHas('prop_showing', function ($q) {
            $q->where('status', '"1"');
        })->get();
        $email_data = EmailTemplate::where('title', 'TENANT SHOWING DATE 8:00 AM')->first();
        if ($email_data->status == '1') {
            $additional = ShowingApplication::with('user', 'property', 'agent')->select('id', 'showing_id', 'property_id', 'agent_id', 'tenant_id', 'showing_date', 'status', 'created_at')->whereIn('tenant_id', explode(',', $email_data->other_reciepients))->with('user')->get();
            $showings = $showings->merge($additional);
            foreach ($showings as $showing) {
                if (in_array('For Rent', explode(',', $showing->property->prop_status))) {
                    $content = str_replace("[FIRST_NAME]", extract_name($showing->user->name)['first_name'], $email_data->content);
                    $content = str_replace("[LAST_NAME]", extract_name($showing->user->name)['last_name'], $content);
                    $content = str_replace("[EMAIL]", $showing->user->email, $content);
                    $content = str_replace("[PROPERTY_ADDRESS]", $showing->property->address, $content);
                    $content = str_replace("[SHOWING_TIME]", $showing->showing_date, $content);
                    $content = str_replace("[AGENT_PHONE]", $showing->agent->phone, $content);
                    $content = str_replace("[CANCEL_VIEWING]", "<a href='" . url("cancel-viewing") . "/" . Crypt::encryptString($showing->id) . "'>Cancel Viewing</a>", $content);
                    $content = str_replace("../..", url('/'), $content);

                    Mail::to($showing->user->email)->send(new ShowingNotification($showing, $content, $email_data->subject));
                    Notification::updateOrCreate(['user_id' => $showing->tenant_id, 'form_id' => $showing->id, 'template' => $email_data->title], ['user_id' => $showing->tenant_id, 'form_id' => $showing->id, 'template' => $email_data->title, 'status' => '1']);

                    EmailTemplate::find($email_data->id)->update(['other_reciepients' => '']);
                    ShowingApplication::find($showing->id)->update(['notify_status' => 1]);
                } else {
                    ShowingApplication::find($showing->id)->update(['notify_status' => 5]);
                }
            }
        }
    }
}
