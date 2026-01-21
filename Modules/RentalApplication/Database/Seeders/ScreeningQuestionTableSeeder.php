<?php

namespace Modules\RentalApplication\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\RentalApplication\Entities\ScreeningQuestion;

class ScreeningQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScreeningQuestion::truncate();
        Model::unguard();


        $questions = [
            ['PRE-SCREENING: Is the household income 2.5 times the rent amount?', 'other', 'radio', '1'],
            ['BANK STATEMENT (BALANCE ONLY) RECEIVED IF HOUSEHOLD INCOME THRESHOLD NOT MET. CURRENT BALANCE IS AT OR ABOVE 3X THE MONTHLY RENT AMOUNT.', 'other', 'radio', '1'],
            ['LANDLORD VERIFICATION INITIATED', 'other', 'radio', '1'],
            ['Hello! (Landlord name), My name is (your name) from For Rent Central Real Estate Management. The reason I am calling is because one of your tenants, (applicant), has applied...', 'landlord', 'textbox', '1'],
            ['Do you have a moment for us to speak with you about (applicant name) landlord reference?', 'landlord', 'radio', '1'],
            ['How long has (applicant name) been renting your unit?', 'landlord', 'textbox', '1'],
            ['Has (applicant name) given you the 30 days notice to move out?', 'landlord', 'radio', '1'],
            ['How much is the rent per month?', 'landlord', 'textbox', '1'],
            ['Have you conducted inspections of the unit, and is it in good condition?', 'landlord', 'radio', '1'],
            ['Have you ever received any complaints about this tenant from neighbors or the strata?', 'landlord', 'radio', '1'],
            ['Would you personally recommend (applicant) as a tenant?', 'landlord', 'radio', '1'],
            ['Thank you for your time and have a great day! LANDLORD CHECK COMPLETE.', 'other', 'radio', '1'],
            ['EMPLOYMENT VERIFICATION INITIATED', 'other', 'radio', '1'],
            ['Hello, may I speak to (Employer Contact Name)?', 'employer', 'radio', '1'],
            ['Hi, my name is (your name) from For Rent Central Real Estate Management. I obtained your contact information from your employee, (applicant). I would like to verify (applicant) employme...', 'employer', 'textbox', '1'],
            ['Could you please verify the position of (applicant name)?', 'employer', 'textbox', '1'],
            ['Has (applicant) been paying the rent on time?', 'employer', 'radio', '1'],
            ['How long has he been in his current position at the company?', 'employer', 'textbox', '1'],
            ['Do you know approximately how much (applicant name) makes per month or annually?', 'employer', 'textbox', '1'],
            ['Is (applicant name) a pleasant employee to deal with? Would you recommend (applicant name) as a future tenant?', 'employer', 'radio', '1'],
            ['Thank you and have a great day! EMPLOYER CHECK COMPLETE.', 'other', 'radio', '1'],
            ['Check court records at https://justice.gov.bc.ca/cso/esearch/civil/partySearch.do', 'other', 'radio', '1'],
            ['CREDIT CHECK DONE', 'other', 'radio', '1'],
            ['OWNER APPROVAL OBTAINED FOR APPLICATION TERMS THAT FALL OUTSIDE OF TENANCY TERMS FOR THE PROPERTY.', 'other', 'radio', '1'],
            ['OWNER NOTIFIED OF APPROVED TENANCY APPLICATION AND PENDING TENANCY AGREEMENT THAT WILL BE SENT AND TO BE SIGNED BY PROSPECTIVE TENANT.', 'other', 'radio', '1'],
            ['TENANCY AGREEMENT SENT via forrentcentral.com', 'other', 'radio', '1'],
        ];

        foreach ($questions as $question) {
            $questionObj = new ScreeningQuestion();
            $questionObj->title = $question[0];
            $questionObj->question_type = $question[1];
            $questionObj->field_type = $question[2];
            $questionObj->status = $question[3];
            $questionObj->created_at = Carbon::now();
            $questionObj->updated_at = Carbon::now();
            $questionObj->save();
        }
    }
}
