<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Leads\Entities\PropertyManagementAgreementForm;
use Modules\Leads\Notifications\RentalEvaluationNotification;

class Welcome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'owner:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Owner welcome notification';

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
        $forms = PropertyManagementAgreementForm::with('user')->select('id', 'user_id', 'n_own', 'won2_email', 'fName_1', 'lName_2', 'phone_4', 'email_5', 'dob_8', 'address_10', 'status', 'created_at')->where('notify_status', '2')->whereBetween('created_at', [Carbon::now()->subDays(2), Carbon::now()->subDays(1)])->get();
        $email_data = EmailTemplate::where('title', 'WELCOME')->first();
        if ($email_data->status == '1') {
            $additional = PropertyManagementAgreementForm::select('id', 'user_id', 'n_own', 'won2_email', 'fName_1', 'lName_2', 'phone_4', 'email_5', 'dob_8', 'address_10', 'status', 'created_at')->whereIn('user_id', explode(',', $email_data->other_reciepients))->with('user')->get();
            $forms = $forms->merge($additional);
            foreach ($forms as $form) {
                $content = str_replace("[FIRST_NAME]", $form->fName_1, $email_data->content);
                $content = str_replace("[LAST_NAME]", $form->lName_2, $content);
                $content = str_replace("[EMAIL]", $form->email_5, $content);
                $content = str_replace("../..", url('/'), $content);

                Notification::route('email', $form->email_5)->notify(new RentalEvaluationNotification($email_data->content, $email_data->subject));

                EmailTemplate::find($email_data->id)->update(['other_reciepients' => '']);
                PropertyManagementAgreementForm::find($form->id)->update(['notify_status' => 3]);
            }
        }
    }
}
