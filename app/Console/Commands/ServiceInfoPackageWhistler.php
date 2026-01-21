<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\GetQuoteNotification;
use App\QuoteRequests;
use App\User;
use App\EmailTemplate;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class ServiceInfoPackageWhistler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_quote:service_info_package_whistler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SERVICE INFO PACKAGE Whistler';

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
        $quotes = QuoteRequests::where('notify_status', '0')->where('area', 'Whistler')->get();
        $email_data = \App\EmailTemplate::where('title', 'SERVICE INFO PACKAGE Whistler')->first();
        if ($email_data->status == '1') {
            $additional = User::whereIn('id', explode(',', $email_data->other_reciepients))->get();

            //$showings = $showings->merge($additional);
            foreach ($quotes as $quote) {
                $content = str_replace("[FIRST_NAME]", extract_name($quote->name)['first_name'], $email_data->content);
                $content = str_replace("[LAST_NAME]", extract_name($quote->name)['last_name'], $content);
                $content = str_replace("[EMAIL]", $quote->email, $content);
                $content = str_replace("../..", url('/'), $content);
                $subject = str_replace("~Contact.FirstName~", extract_name($quote->name)['first_name'], $email_data->subject);
                Mail::to($quote->email)->send(new GetQuoteNotification($quote, $content, $subject));
                Notification::updateOrCreate(['email' => $quote->email, 'form_id' => $quote->id, 'template' => $email_data->title], ['email' => $quote->email, 'form_id' => $quote->id, 'template' => $email_data->title, 'status' => '1']);
                $quote_update = QuoteRequests::find($quote->id)->update(['notify_status' => 1]);
            }
            if ($additional) {
                foreach ($additional as $quote) {
                    $content = str_replace("[FIRST_NAME]", extract_name($quote->name)['first_name'], $email_data->content);
                    $content = str_replace("[LAST_NAME]", extract_name($quote->name)['last_name'], $content);
                    $content = str_replace("[EMAIL]", $quote->email, $content);
                    $content = str_replace("../..", url('/'), $content);
                    $subject = str_replace("~Contact.FirstName~", extract_name($quote->name)['first_name'], $email_data->subject);
                    Mail::to($quote->email)->send(new GetQuoteNotification($quote, $content, $subject));
                    Notification::updateOrCreate(['user_id' => $quote->id, 'form_id' => 0, 'template' => $email_data->title], ['user_id' => $quote->id, 'form_id' => 0, 'template' => $email_data->title, 'status' => '1']);
                    $template = EmailTemplate::find($email_data->id)->update(['other_reciepients' => '']);
                }
            }
        }
    }
}
