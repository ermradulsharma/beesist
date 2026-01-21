<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Leads\Entities\PropertyManagementAgreementForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\PmaNotification;
use App\Models\Notification;

class Insurance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'owner:insurance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Owner insurance notification';

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
        $forms = PropertyManagementAgreementForm::with('user')->select('id', 'user_id', 'n_own', 'won2_email', 'fName_1', 'lName_2', 'phone_4', 'email_5', 'dob_8', 'address_10', 'status', 'created_at')->where('notify_status', '3')->whereBetween('created_at', [Carbon::now()->subDays(3), Carbon::now()->subDays(2)])->get();
        $email_data = EmailTemplate::where('title', 'INSURANCE')->first();
        if ($email_data->status == '1') {
            $additional = PropertyManagementAgreementForm::select('id', 'user_id', 'n_own', 'won2_email', 'fName_1', 'lName_2', 'phone_4', 'email_5', 'dob_8', 'address_10', 'status', 'created_at')->whereIn('user_id', explode(',', $email_data->other_reciepients))->with('user')->get();
            $forms = $forms->merge($additional);
            foreach ($forms as $form) {
                $content = str_replace("[FIRST_NAME]", $form->fName_1, $email_data->content);
                $content = str_replace("[LAST_NAME]", $form->lName_2, $content);
                $content = str_replace("[EMAIL]", $form->email_5, $content);
                $content = str_replace("../..", url('/'), $content);

                Mail::to($form->email_5)->send(new PmaNotification($form, $content, $email_data->subject));
                Notification::updateOrCreate(['user_id' => $form->user_id, 'form_id' => $form->id, 'template' => $email_data->title], ['user_id' => $form->user_id, 'form_id' => $form->id, 'template' => $email_data->title, 'status' => '1']);

                EmailTemplate::find($email_data->id)->update(['other_reciepients' => '']);
                PropertyManagementAgreementForm::find($form->id)->update(['notify_status' => 4]);
            }
        }
    }
}
