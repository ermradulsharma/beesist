<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RentalEvaluation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Leads\Notifications\RentalEvaluationNotification;

class YourRentalEvaluationReady extends Command
{
    protected $signature = 'owner:yourrentalevaluationready';
    protected $description = 'Your Rental Evaluation is ready';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $RentalEvaluations = RentalEvaluation::select('id', 'name', 'email', 'phone', 'address', 'unit_no', 'bedrooms', 'notify_status')->where('notify_status', '0')->whereBetween('created_at', [Carbon::now()->subdays(2), Carbon::now()->subMinutes(60)])->get();
        $email_data = EmailTemplate::where('title', 'YOUR RENTAL EVALUATION IS READY')->first();
        if ($email_data && $email_data->status == '1') {
            foreach ($RentalEvaluations as $RentalEvaluation) {
                $first_name = $RentalEvaluation->first_name;
                $content = str_replace("[FIRST_NAME]", $first_name, $email_data->content);
                $subject = str_replace("[Property_Address]", $RentalEvaluation->address, $email_data->subject);
                Notification::route('email', $RentalEvaluation->email)->notify(new RentalEvaluationNotification($email_data, $subject));
                $RentalEvaluation->update(['notify_status' => 1]);
            }
        }
    }
}
