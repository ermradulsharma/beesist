<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Modules\Cms\Entities\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        EmailTemplate::truncate();
        $emailTemplates = [
            [
                'title' => 'Rental Evaluation Welcome',
                'slug' => 'rental-evaluation-welcome',
                'subject' => 'Rental Evaluation ([ADDRESS]) Rent For Central Real Estate Management',
                'scheduled_time' => 'After Sending Rental Evaluation Request',
                'schedule_desc' => 'After Sending Rental Evaluation Request',
                'content' => '
                    <p>Your rental evaluation request has been received!</p>
                    <p>We will conduct a comparative market analysis. We compare your rental property with similar properties currently available in the area where your property is located.</p>
                    <p>We will be in touch with you shortly. In the meantime please feel free to reach out if you have any questions.</p>
                    <p>For details of our services and fees please click below.</p>
                    <p><a href="#service_details">SERVICE DETAILS</a></p>
                    <p>Thank you!</p>
                    <h3 id="service_details"><strong>Our Services</strong></h3>
                    <p><strong>Tenant placement</strong></p>
                    <p>Proven marketing strategy will get your property rented faster and at highest market rental rate. The service includes</p>
                    <ul>
                        <li aria-level="1">All advertisement of your property (no extra marketing charges)</li>
                        <li aria-level="1">Professional photographs</li>
                        <li aria-level="1">Timely showings upon request</li>
                        <li aria-level="1">Industry leading background screening of prospects including credit check</li>
                        <li aria-level="1">Signing of an enforceable tenancy agreement and collection of the security deposit and first month’s rent</li>
                        <li aria-level="1">Move in inspection with a report including photographs</li>
                    </ul>
                    <h3><strong>Property Management</strong></h3>
                    <p>Full property management service includes:</p>
                    <ul>
                        <li aria-level="1">Timely collection of the rent</li>
                        <li aria-level="1">Monthly and annual statements</li>
                        <li aria-level="1">Access to all documents online</li>
                        <li aria-level="1">Handling of any maintenance requests</li>
                        <li aria-level="1">Communication and cooperation with your strata corporation</li>
                        <li aria-level="1">Enforcement of Residential Tenancy Act and handling of any disputes</li>
                        <li aria-level="1">Quarterly inspections</li>
                        <li aria-level="1">Non Resident Tax filing</li>
                    </ul>
                    <h4><strong>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</strong></h4>
                    <h3><strong>&ldquo;Efficiency of our procedures and the use of advanced technology are the keys to a superior service at reasonable rates&rdquo;</strong></h3>
                    <h3><strong>Our Fees</strong></h3>
                    <h3><strong>Tenant placement</strong></h3>
                    <ul>
                        <li aria-level="1">45% of one month’s rent for any house or condo with full property management</li>
                    </ul>
                    <h3><strong>Property management unfurnished properties</strong></h3>
                    <ul>
                        <li aria-level="1">6% of gross rent per month or a minimum of $80 plus GST for a condo/townhouse or a minimum of $120 plus GST for a house, whichever is greater</li>
                        <li aria-level="1">management fee applicable only when property rented</li>
                    </ul>
                    <h4><strong>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</strong></h4>
                    <p>Usually the last week of previous month and the first week of the month prior to the desired tenant placement date are the best times to find a prospective tenant. In case that you are planning to rent your property within 1 month, it is crucial to start advertising as soon as possible.</p>',
                'command' => null,
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => null,
            ],
            [
                'title' => 'Rental Evaluation Report',
                'slug' => 'rental-evaluation-report',
                'subject' => 'Rental Evaluation ([address]) For Rent Central Real Estate Management',
                'scheduled_time' => 'After Sending Rental Evaluation Report',
                'schedule_desc' => 'After Sending Rental Evaluation Report',
                'content' => '
                    <table style="width: 100%; height: 894px;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 156px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 156px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;">
                                    <table style="width: 100%; border-collapse: separate;" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="padding-right: 15px; vertical-align: middle; text-align: left; padding: 10px;">[LOGO]</td>
                                                <td style="font: 13px/18px Arial, Helvetica, sans-serif; padding-left: 10px; text-align: right; word-wrap: break-word; word-break: break-word; vertical-align: middle;">B-2127 Granville Street<br>Vancouver BC V6H 3E9<br>Web: <a href="https://forrentcentral.com/" target="_blank" rel="noopener">forrentcentral.com</a><br>Tel: 855-266-8588<br>Follow: @forrentcentral</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><hr></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr style="height: 22px;">
                                <td class="title" style="font: 22px/22px Arial, Helvetica, sans-serif; font-weight: 600; color: #000; padding: 0px 0px 10px; height: 22px;" align="center" data-color="title" data-size="size title" data-min="22" data-max="45" data-link-color="link title color">PROPERTY RENTAL EVALUATION</td>
                            </tr>
                            <tr style="height: 20px;">
                                <td class="title" style="font: 18px/20px Arial, Helvetica, sans-serif; font-weight: 600; color: #666; padding: 0px 0px 10px; height: 20px;" align="center" data-color="title" data-size="size title" data-min="20" data-max="45" data-link-color="link title color">Dear [first_name]</td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px; height: 20px;" align="center" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">We are an independent licensed rental management company with qualified and experienced property managers. We live and breathe rental property management and our entire focus is on maximizing your investment.</td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="font: 14px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 0px; background-color: #000000; height: 23px;" align="center" data-color="text" data-size="size text" data-min="30" data-max="40" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;"><span style="color: #ed1c24;">NEW OWNER SPECIAL:</span> Sign up today and get the first MONTH OF MANAGEMENT FREE !*</td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="height: 20px;">&nbsp;</td>
                            </tr>
                            <tr style="height: 78px;">
                                <td style="height: 78px;" align="center">
                                    <table style="border: 1px solid #000;" border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 13.0039%; border-right: 1px solid #000; border-bottom: 1px solid #000;" align="center">Unit Number</th>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 24.1873%; border-right: 1px solid #000; border-bottom: 1px solid #000;" align="center">Address</th>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 8.06242%; border-right: 1px solid #000; border-bottom: 1px solid #000;" align="center">Size/sq ft</th>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 18.1404%; border-right: 1px solid #000; border-bottom: 1px solid #000;" align="center">Number of Bedrooms</th>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 18.5956%; border-right: 1px solid #000; border-bottom: 1px solid #000;" align="center">Number of Bathrooms</th>
                                                <th style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px 2px; background-color: #ed1c24; width: 18.0104%; border-bottom: 1px solid #000;" align="center">Expected RentalRate</th>
                                            </tr>
                                            <tr>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 13.0039%; border-right: 1px solid #000;" align="center">[listing_number]</td>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 24.1873%; border-right: 1px solid #000;" align="center">[address]</td>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 8.06242%; border-right: 1px solid #000;" align="center">[area]</td>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 18.1404%; border-right: 1px solid #000;" align="center">[beds]</td>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 18.5956%; border-right: 1px solid #000;" align="center">[baths]</td>
                                                <td style="font: bold 13px/23px Arial, Helvetica, sans-serif; color: #000000; padding: 7px 2px; width: 18.0104%;" align="center">[rate]</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="height: 20px;">&nbsp;</td>
                            </tr>
                            <tr style="height: 32px;">
                                <td style="font: 11px/16px Arial, Helvetica, sans-serif; color: #000000; padding: 0px 0px 23px; height: 32px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">*The rental evaluation in this document represents an estimate of the rent for the above property unfurnished, no utilities included, taking into consideration the prices in the current rental market. The estimate is provided free of charge and is valid for 30 days from the date of rental evaluation. The enclosed estimate is deemed correct but not guaranteed.</td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="height: auto;" align="center">
                                    <table width="300" cellspacing="5" cellpadding="5">
                                        <tbody>
                                            <tr>
                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation">Schedule a FREE Consultation!</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 140px;">
                                <td style="height: 140px;" align="center">
                                    <table border="0" width="100%" cellspacing="5" cellpadding="5">
                                        <tbody>
                                            <tr>
                                                <td style="font: 14px/23px Arial, Helvetica, sans-serif; color: #000; padding: 7px 0px; width: 50%;" align="left" width="50%"><h4 style="color: #ed1c24;">Fees</h4><strong>Placement Fee</strong><span style="color: #ed1c24;">45%</span> of one month&rsquo;s rent<br><strong>Management Fee</strong><span style="color: #ed1c24;">6%</span> of gross monthly rent commencing on the first month of rent or a minimum of $80 for a condo/townhouse or a minimum of $120 for a house, whichever is greater</td>
                                                <td style="font: 14px/23px Arial, Helvetica, sans-serif; color: #000; padding: 7px 0px; width: 50%;" align="left" width="50%"><h4 style="color: #ed1c24;">Service Highlights</h4><strong>Flexible Contracts </strong>- only a one month notice required<br><strong>Meticulous Tenant Screening </strong>- no placement w/o credit check <br><strong>Regular Inspection</strong> - 3-4 routine inspection per year<br><strong>Up to Date Rental Rates</strong> - automatic rent increase to maximize rent</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 20px;">
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="font: 14px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px; background-color: #ed1c24; border: 1px solid #000000; height: 23px;" align="center" data-color="text" data-size="size text" data-min="30" data-max="40" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;"><span style="color: #000;">INQUIRE ABOUT OUR RENT GUARANTEE PROGRAM!</span> CALL 855-266-8588 to SCHEDULE a FREE CONSULTATION TODAY!</td>
                            </tr>
                            <tr style="height: 15px;">
                                <td style="height: 15px;"></td>
                            </tr>
                            <tr style="height: 16px;">
                                <td style="font: 11px/16px Arial, Helvetica, sans-serif; color: #000000; padding: 0px; height: 16px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">*New clients only. Completion of 1 year management term is required. Placement fee is payable first month and the following two months of management are free. Call for the details.</td>
                            </tr>
                            <tr style="height: 15px;">
                                <td style="height: 15px;"></td>
                            </tr>
                            <tr style="height: 23px;">
                                <td style="font: bold 16px/23px Arial, Helvetica, sans-serif; color: #ffffff; padding: 7px; background-color: #000000; border: 1px solid #000000; height: 23px;" align="center" data-color="text" data-size="size text" data-min="30" data-max="40" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">Being a Landlord has never been easier.</td>
                            </tr>
                            <tr style="height: 40px;">
                                <td style="height: 40px;"></td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'Rental Evaluation Report',
                'other_reciepients' => 'null',
                'role' => 'Property Owner',
                'notify_trigger' => 'Rental Evaluation Report',
            ],
            [
                'title' => 'SETUP OWNER',
                'slug' => 'setup-owner',
                'subject' => 'SETUP OWNER - ' . appName() . ' Property Management',
                'scheduled_time' => null,
                'schedule_desc' => 'After 1 hour of PMA submission',
                'content' => '
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Dear <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Please set up the following owner in our system:</p>
                                    <p>Owner: [FIRST_NAME] , [LAST_NAME] , [EMAIL]</p>
                                    <h3>Set up OWNER in:</h3>
                                    <ol>
                                        <li>Set up owner in Buildium</li>
                                        <li>Set up owner in STREAK contacts</li>
                                        <li>Upload documents to Buildium - PMA, strata bylaws if applicable</li>
                                        <li>Invite OWNER to buildium</li>
                                        <li>Create folder on Dropbox as per template in RENTALS folder</li>
                                        <li>Upload documents to dropbox, create folder if necessary</li>
                                    </ol>
                                    <h3>Set up OWNER in:</h3>
                                    <ol>
                                        <li>Set up property in STREAK/PROPERTIES pipeline</li>
                                        <li>Set up property in buildium</li>
                                        <li>Set up property on forrentcentral.com</li>
                                        <li>Start advertising on - forrentcentral.com, craigslist, zumper, padmapper, facebook</li>
                                        <li>schedule showings (minimum of two showings one during the week and one during the weekend.</li>
                                    </ol>
                                    <p>Please review the instructions by clicking on the link below if you are not sure about the process above.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="#"><span style="text-decoration: none; text-underline: none;">REVIEW INSTRUCTIONS FOR THE ABOVE</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Fill out tenant set up checklist</h3>
                                    <p>Submitting the checklist is mandatory!</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="#"><span style="text-decoration: none; text-underline: none;">REVIEW INSTRUCTIONS FOR THE ABOVE</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Contact your supervisor or myself</h3>
                                    <p>If you have any questions please talk to your supervisor or myself.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:setupowner',
                'other_reciepients' => null,
                'role' => 'Admin',
                'notify_trigger' => 'After PMA',
            ],
            [
                'title' => 'WELCOME',
                'slug' => 'welcome',
                'subject' => 'WELCOME - ' . appName() . ' Property Management',
                'scheduled_time' => null,
                'schedule_desc' => 'After 1 day of PMA submission',
                'content' => '
                    <table style="height: 805px; width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr style="height: 533px;">
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px; height: 533px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Welcome to the <span style="color: red;">' . appName() . ' Real Estate Management Family</span>,</p>
                                    <p>Thanks again for your trust in our company.</p>
                                    <p>Please take a moment and review your owner guide. On the page you will be able to schedule a consultation with one of our property managers who can provide one on one guidance if you have any issues or simply need help.</p>
                                    <h3>Reviewing our Owner Guide</h3>
                                    <h4>Reviewing our Owner Guide</h4>
                                    <ul>
                                        <li>How to contact us</li>
                                        <li>How to set up a call with your manager</li>
                                        <li>How to purchase rental property insurance</li>
                                        <li>How it to review your property financials</li>
                                        <li>How to access all your documents</li>
                                        <li>How to submit your requests</li>
                                        <li>How to generate and access all your rental reports</li>
                                        <li>How to login to your profile and more</li>
                                    </ul>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://bolldpm.com/owner/owner-guide/"><span style="text-decoration: none; text-underline: none;">VIEW OWNER GUIDE</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Log in to your Profile</h3>
                                    <p>After reviewing the <span style="color: red;">Owner Guide</span> you will be ready to log into your profile. Please click the button below to log in to your profile.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="//bolld.managebuilding.com/manager"><span style="text-decoration: none; text-underline: none;">OWNER LOGIN</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Owner Portal Overview</h3>
                                    <p>The system provides you with a real time financial overview and stores all documents related to your property. Watch the video below.</p>
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="alignmentContainer" style="overflow-wrap: break-word; font-size: 0px; padding: 15px; text-align: center;">
                                                    <a style="margin-left: auto; margin-right: auto;" href="//youtu.be/I6HdlT1HIgE">
                                                        <img style="width: 80%;" src="//d1yoaun8syyxxt.cloudfront.net/wz327-66a4ebed-0a8c-47e4-a0ae-6237746aaea4-v2" width="450">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Owner Portal Overview</h3>
                                    <p>We like to keep the communication lines with our customers open so we can provide the best possible service at all times. We`ll always be here to answer your questions or address any concerns. We value your feedback and appreciate your opinion. We will be sending you another email in a couple days asking about your experience with us.</p>
                                    <p>If you have any questions, please send us an email or give us a call at <strong>855-266-8588</strong>.</p>
                                    <p>Again, welcome to the <span style="color: red;">' . appName() . ' Real Estate Management Family</span> and let us know if there is anything we can help with!</p>
                                    <p>Have a great day!</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:welcome',
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => 'After PMA',
            ],
            [
                'title' => 'INSURANCE',
                'slug' => 'insurance',
                'subject' => 'INSURANCE - ' . appName() . ' Property Management',
                'scheduled_time' => null,
                'schedule_desc' => 'After 2 day of PMA submission',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hello <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thanks again for choosing ' . appName() . ' Real Estate Management! In order to protect your property our tenants are required to purchase a tenant insurance policy. However the tenant insurance only protects the tenants property and protects them from liability from their owner doing. Any damage arising from the property itself such as faulty washing machine, would be responsibility of the owner. It is crucial to purchase a rental property insurance in order to protect your property. To make the insurance purchase easy, we have partnered up with Nuera Insurance and you can purchase the insurance directly on our website. As our valued customer a discount will be automatically applied to your purchase. We set up this feature on our site solely for your convenience. We do not receive any commission or benefits from the sale of the policies.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="../../../../rental-property-insurance"><span style="text-decoration: none; text-underline: none;">PURCHASE YOUR INSURANCE NOW</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>You are welcome to use any other insurance provider. Please send us the copy of your insurance policy to <a href="mailto:info@forrentcentral.ca"><span style="color: red;">info@forrentcentral.ca</span></a> or simply reply to this email. Please remember that the rental property insurance is mandatory.</p>
                                    <p>We hope you will never need to file any insurance claim!</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:insurance',
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => 'After PMA',
            ],
            [
                'title' => 'SURVEY',
                'slug' => 'survey',
                'subject' => 'SURVEY - ' . appName() . ' Property Management',
                'scheduled_time' => null,
                'schedule_desc' => 'After 3 day of PMA submission',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Dear <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thank you so much for your business!</p>
                                    <p>How are we doing so far?</p>
                                    <p>Please help us serve you better and fill out the quick 2 minutes survey. The survey is confidential.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="//docs.google.com/forms/d/e/1FAIpQLSdMNepkH1bDkANH-pGhm9XlIBUMVX96yLucm9jcBWrfosWeJw/viewform?usp=sf_link"><span style="text-decoration: none; text-underline: none;">TAKE SURVEY</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Have you experienced any issues during the process of renting your property that you would like to share with myself?</p>
                                    <p>Please do not hesitate and reach out! Simply reply to this email or schedule a phone call below.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="//www.scheduleyou.in/CN5PKcBfhz"><span style="text-decoration: none; text-underline: none;">SCHEDULE CALL</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:survey',
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => 'After PMA',
            ],
            [
                'title' => 'REFER US',
                'slug' => 'refer-us',
                'subject' => 'REFER US - ' . appName() . ' Property Management',
                'scheduled_time' => null,
                'schedule_desc' => 'After 4 day of PMA submission',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hello <strong>[FIRST_NAME]</strong>,</p>
                                    <p>I just want to let you know that we strive to ensure that we provide the highest level of satisfaction.</p>
                                    <p>I just have one question:</p>
                                    <p><strong>Would you recommend ' . appName() . ' Real Estate Management to your friends?</strong></p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="#"><span style="text-decoration: none; text-underline: none;">Yes</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="../../../../customer-feedback"><span style="text-decoration: none; text-underline: none;">No</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:reffer',
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => 'After PMA',
            ],
            [
                'title' => 'TENANT SHOWING DATE 8:00 AM',
                'slug' => 'tenant-showing-date-800-am',
                'subject' => 'Before showing Tenant Notifications',
                'scheduled_time' => null,
                'schedule_desc' => '8 am the day of the showing',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Dear <strong>[FIRST_NAME]</strong>,</p>
                                    <p>This a friendly reminder that you have a confirmed viewing of rental property at <strong>[PROPERTY_ADDRESS]</strong> at <strong>[SHOWING_TIME]</strong>.</p>
                                    <p>The agent`s phone number is <strong>[AGENT_PHONE]</strong>.</p>
                                    <p>If you need to cancel the viewing please click on this link <strong>[CANCEL_VIEWING]</strong>.</p>
                                    <p>*Please take a moment to review the attached disclosures</p>
                                    <p>Thank you! We will see you soon.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <img src="https://forrentcentral.com/img/email/Disclosure-for-Residential-Tenancies_Page_1.jpg" alt="Disclosure for Residential Tenancies pg 1">
                        <img src="https://forrentcentral.com/img/email/Disclosure-for-Residential-Tenancies_Page_2.jpg" alt="Disclosure for Residential Tenancies pg 2">
                    </p>',
                'command' => 'tenant:showing_date_first',
                'other_reciepients' => null,
                'role' => 'Tenant',
                'notify_trigger' => 'Before Showing Date at 8:00 AM',
            ],
            [
                'title' => 'TENANT BEFORE 2H OF SHOWING',
                'slug' => 'tenant-before-2h-of-showing',
                'subject' => 'Before 2hours of showing Tenant Notifications',
                'scheduled_time' => null,
                'schedule_desc' => 'Before 2hours of showing',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Dear <strong>[FIRST_NAME]</strong>,</p>
                                    <p>This a friendly reminder that you have a confirmed viewing of rental property at <strong>[PROPERTY_ADDRESS]</strong> at <strong>[SHOWING_TIME]</strong>.</p>
                                    <p>The agent`s phone number is <strong>[AGENT_PHONE]</strong>.</p>
                                    <p>As our schedule is very tight, please make sure you arrive on time. Unfortunately, we are not able to wait for longer than 10 minutes.</p>
                                    <p>If you need to cancel the viewing please click on this link <strong>[CANCEL_VIEWING]</strong>.</p>
                                    <p>Thank you! We will see you soon.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'tenant:showing_date_second',
                'other_reciepients' => null,
                'role' => 'Tenant',
                'notify_trigger' => 'Before 2hours of showing time',
            ],
            [
                'title' => 'SHOWING FOLLOW UP',
                'slug' => 'showing-follow-up',
                'subject' => 'Thank you for attending the showing',
                'scheduled_time' => null,
                'schedule_desc' => 'Wait at least 1 hour and then run between 6:00 PM - 7:30 PM',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Dear, <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thank you for attending the showing.</p>
                                    <h3>Apply Online</h3>
                                    <p>We hope you liked our rental listing. If you liked the property and would like to apply, please click on the link below to start.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="//bolld.managebuilding.com/Resident/apps/rentalapp"><span style="text-decoration: none; text-underline: none;">APPLY ONLINE</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Looking for something else?</h3>
                                    <p>The property you visited is not exactly what you were looking for?</p>
                                    <p>Please have a look at our available listings or send us an email with your requirements and lease start date and we might just be able to help you find your dream home.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="../../../../for-rent"><span style="text-decoration: none; text-underline: none;">FIND A HOME</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Help us serve you better</h3>
                                    <p>Your opinion matters to us. Please share your experience in a quick 2 minutes survey below. We appreciate your feedback on the listing you viewed.</p>
                                    <p>Take our survey: <a href="//goo.gl/forms/lAZ3u6QOllZjt8pB2">//goo.gl/forms/lAZ3u6QOllZjt8pB2</a></p>
                                    <p>Please do not hesitate to contact us, if you have any questions.</p>
                                    <p>Have a great week!</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'tenant:showing_follow_up',
                'other_reciepients' => null,
                'role' => 'Tenant',
                'notify_trigger' => 'After 1 hour of showing',
            ],
            [
                'title' => 'SHOWING SURVEY',
                'slug' => 'showing-survey',
                'subject' => 'Rate your showing experience',
                'scheduled_time' => null,
                'schedule_desc' => 'Wait at least 5 minutes and then run at any time',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hello <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thank you for visiting one of our rental listings!</p>
                                    <p>Your opinion matters to us. Please take our short survey (it only takes a couple of minutes) and help us to improve our services. You will get the opportunity to rate both property you visited and our property manager.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="#"><span style="text-decoration: none; text-underline: none;">TAKE OUR SURVEY</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>If you are having any questions please reply to this email or call our Toll Free number at 855-266-8588</p>
                                    <p>Thanks again and have a great evening!</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'tenant:showing_survey',
                'other_reciepients' => null,
                'role' => 'Tenant',
                'notify_trigger' => 'After 5 min of Showing follow up',
            ],
            [
                'title' => 'SERVICE INFO PACKAGE',
                'slug' => 'service-info-package',
                'subject' => 'Hi ~Contact.FirstName~, Here is the Information You Need!',
                'scheduled_time' => 'Within 5 Min',
                'schedule_desc' => 'Within 5 Min of Get a Quote Request',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hi <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thank you so much for your interest in our services! Please see below the requested details. Please let us know if there is anything we can help you with.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">QUESTIONS? SCHEDULE A FREE PHONE CONSULTATION NOW!</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>Our Services</h3>
                                    <p><strong>Tenant placement </strong></p>
                                    <p>Proven marketing strategy will get your property rented faster and at highest market rental rate. The service includes</p>
                                    <ul>
                                        <li>All advertisement of your property (no extra marketing charges)</li>
                                        <li>Professional photographs</li>
                                        <li>Timely showings upon request</li>
                                        <li>Industry leading background screening of prospects including credit check</li>
                                        <li>Signing of an enforceable tenancy agreement and collection of the security deposit and first month`s rent</li>
                                        <li>Move in inspection with a report including photographs</li>
                                    </ul>
                                    <h3>Property Management</h3>
                                    <p>Full property management service includes:</p>
                                    <ul>
                                        <li>Timely collection of the rent</li>
                                        <li>Monthly and annual statements</li>
                                        <li>Access to all documents online</li>
                                        <li>Handling of any maintenance requests</li>
                                        <li>Communication and cooperation with your strata corporation</li>
                                        <li>Enforcement of Residential Tenancy Act and handling of any disputes</li>
                                        <li>Quarterly inspections</li>
                                        <li>Non Resident Tax filing</li>
                                    </ul>
                                    <h4>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</h4>
                                    <h3 style="color: #ed1c24; text-align: center; margin: 20px auto;">"Efficiency of our procedures and the use of advanced technology are the keys to a superior service at reasonable rates"</h3>
                                    <hr>
                                    <h3>Our Fees</h3>
                                    <h3><strong>Tenant placement </strong></h3>
                                    <ul>
                                        <li>45% of one month`s rent for any house or condo with full property management</li>
                                    </ul>
                                    <h3>Property management</h3>
                                    <ul>
                                        <li>6% of gross rent per month or a minimum of $80 plus GST for a condo/townhouse or a minimum of $120 plus GST for a house, whichever is greater</li>
                                        <li>management fee applicable only when property rented</li>
                                    </ul>
                                    <h4>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</h4>
                                    <hr>
                                    <p>Usually the last week of previous month and the first week of the month prior to the desired tenant placement date are the best times to find a prospective tenant. In case that you are planning to rent your property within 1 month, it is crucial to start advertising as soon as possible.</p>
                                    <hr>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">QUESTIONS? SCHEDULE A FREE PHONE CONSULTATION NOW!</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'get_quote:service_info_package',
                'other_reciepients' => null,
                'role' => 'Get A Quote',
                'notify_trigger' => 'Within 5 Min of Get a Quote Request',
            ],
            [
                'title' => 'ENGAGEMENT EMAIL 1',
                'slug' => 'engagement-email-1',
                'subject' => 'Are You Still Looking for a Tenant, ~Contact.FirstName~ ?',
                'scheduled_time' => 'Wait at least 2 days and then run on a weekday at 8:00 AM',
                'schedule_desc' => 'Wait at least 2 days and then run on a weekday at 8:00 AM',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p><strong>[FIRST_NAME]</strong>,</p>
                                    <p>Thanks again for your interest in our property management services!</p>
                                    <p>I would like to quickly touch base with you. I was wondering if you had a chance to review the details of our services and if you had any questions?</p>
                                    <p>I understand that renting your investment property is a time consuming and a challenging task at the same time. The choice of your tenant will have an impact on your property`s safety and profitability.</p>
                                    <p>You reached out to an expert and I am guessing that you might need help?</p>
                                    <p>Are you wondering how to determine the asking rental rate or what it should be, how to advertise or how to screen the tenants? We are here to help you.</p>
                                    <p>We would love to schedule a free, no obligation consultation to discuss how we might be able to help with your rental property.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">Request your FREE Consultation</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'get_quote:engagement_email1',
                'other_reciepients' => null,
                'role' => 'Get A Quote',
                'notify_trigger' => 'After 2 days at 8:00 AM',
            ],
            [
                'title' => 'ENGAGEMENT EMAIL 2',
                'slug' => 'engagement-email-2',
                'subject' => 'Help with your rental property',
                'scheduled_time' => 'Weekday at 3:00 PM',
                'schedule_desc' => 'Wait at least 2 days and then run on a weekday at 3:00 PM',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hello <strong>[FIRST_NAME]</strong>,</p>
                                    <p>Are you still looking for a help with your rental property?</p>
                                    <p>We helped many homeowners to rent out their properties. Our company specializes in management of individually owned units. You can count on the quality of our service and our commitment to you as an owner.</p>
                                    <p>Unlike other companies we do not lock you in long term contracts and if you are not happy or you just do not need management any more, you can simply cancel. Our service covers all aspects your needs and the needs of your property.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">Schedule Your Consultation</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <p style="text-align: center;"><em>"As a first time property owner, I had a great relationship and experience from the purchase of a condo unit to finding a tenant while still earning a monthly profit. They were there every step of the way and was always available to answer all my question at a moment`s notice. Couldn`t be happier with the ' . appName() . ' team and look forward to continuing the relationship."</em></p>
                                    <p style="text-align: center;"><strong>Kevin, Vancouver</strong></p>
                                    <hr>
                                    <h3>Work With an Expert</h3>
                                    <p>It would be my pleasure to schedule a free consultation to discuss how we might be able to help you with your rental property.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table width="auto" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">Schedule Your Consultation</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'get_quote:engagement_email2',
                'other_reciepients' => null,
                'role' => 'Get A Quote',
                'notify_trigger' => 'After 2 Days of ENGAGEMENT EMAIL 1',
            ],
            [
                'title' => 'ENGAGEMENT EMAIL 3 CONSULT REQUEST',
                'slug' => 'engagement-email-3-consult-request',
                'subject' => 'Are you still looking for a tenant, ~Contact.FirstName~?',
                'scheduled_time' => 'Weekday at 12:15 PM',
                'schedule_desc' => 'Wait at least 1 week and then run on a weekday at 12:15 PM',
                'content' => '
                <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="height: 28px;">
                            <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                        </tr>
                        <tr style="height: 10px;">
                            <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                <p>Hi <strong>[FIRST_NAME]</strong>,</p>
                                <p>I hope you are doing well!</p>
                                <p>It has been a week since I last touched base with you.</p>
                                <p>I am sure you are busy but if you have a moment I would love to schedule a chat on the phone or a meeting at your property to answer any of your questions.</p>
                                <p>It is a great opportunity for us to meet, see your property. I would give you an accurate estimate on your rental rate and provide you with the newest rental market insights.</p>
                                <p>Again your consultation is free and there is absolutely no obligation.</p>
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <table width="auto" cellspacing="5" cellpadding="5">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation"><span style="text-decoration: none; text-underline: none;">Schedule Your Consultation</span></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>I look froward to helping you with your rental. Hope to hear from you soon.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>',
                'command' => 'get_quote:consult_request',
                'other_reciepients' => null,
                'role' => 'Get A Quote',
                'notify_trigger' => 'After 1 week of ENGAGEMENT EMAIL 2',
            ],
            [
                'title' => 'SERVICE INFO PACKAGE Whistler',
                'slug' => 'service-info-package-whistler',
                'subject' => 'Hi ~Contact.FirstName~, Here is the Information You Need!',
                'scheduled_time' => 'Within 5 Min',
                'schedule_desc' => 'Within 5 Min of Get a Quote Request',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hi <strong>[FIRST_NAME]</strong>!</p>
                                    <p>Thank you so much for your interest in our services! Please see below the requested details. Please let us know if there is anything we can help you with.</p>
                                    <h3 style="color: #ed1c24;">Our Services</h3>
                                    <p><strong>Property Management</strong></p>
                                    <p>Proven marketing strategy will get your property rented faster and at highest market rental rate. The service includes</p>
                                    <ul>
                                        <li>We are fully insured, bonded and licensed by the Consumer Protection Agency of British Columbia</li>
                                        <li>We help you set up your vacation rental with all necessary equipment</li>
                                        <li>We research the rates and design marketing strategy based on seasonality and location</li>
                                        <li>We efficiently market your property on most popular vacation rental websites</li>
                                        <li>We provide full booking service and management</li>
                                        <li>We screen the guest, regularly check the inventory and collect the damage deposit</li>
                                        <li>We offer 24/7 check in and check out access to the properties</li>
                                        <li>We offer the maintenance and cleaning of the properties</li>
                                        <li>We collect the accommodation fees and remit the GST generated by the property</li>
                                        <li>We provide full financial statements</li>
                                        <li>We offer access to booking for owner&rsquo;s personal use</li>
                                        <li>All advertisement of your property (no extra marketing charges)</li>
                                        <li>Professional photographs</li>
                                        <li>Timely response to all booking inquiries</li>
                                        <li>Monthly and annual statements</li>
                                        <li>Access to all documents online</li>
                                        <li>Handling of any maintenance requests</li>
                                        <li>Communication and cooperation with your strata corporation</li>
                                        <li>Regular inspections/inventory checks</li>
                                        <li>Non Resident Tax filing</li>
                                    </ul>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="http://www.scheduleyou.in/CN5PKcBfhz"><span style="text-decoration: none; text-underline: none;">QUESTIONS? SCHEDULE A FREE PHONE CONSULTATION HERE!</span></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3 style="color: #ed1c24; text-align: center; margin: 20px auto;">"Efficiency of our procedures and the use of advanced technology are the keys to a superior service at reasonable rates"</h3>
                                    <hr>
                                    <h3>Our Fees</h3>
                                    <h3><strong>Property Management Fee</strong></h3>
                                    <p>Our management fee is competitive and straight forward. We reinvest each year in the marketing and upkeep of your property. Basic maintenance and basic supplies are included in the management fee.</p>
                                    <p>20% of Gross rental revenues</p>
                                    <h3>There are no hidden fees or extra charges.</h3>
                                    <hr style="border-bottom: #dddddd;">
                                    <p>It takes some time to establish a listing on sites like HomeAway and AirBnB. These listing sites take into account the age of the listing, number of reviews, quality of the listing and based on these factors they position your listing on their site. In case that you are planning to rent your property within 1 month, it is crucial to start advertising as soon as possible.</p>
                                    <hr>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'get_quote:service_info_package',
                'other_reciepients' => null,
                'role' => 'Get A Quote',
                'notify_trigger' => 'Within 5 Min of Get a Quote Request',
            ],
            [
                'title' => 'YOUR RENTAL EVALUATION IS READY',
                'slug' => 'your-rental-evaluation-is-ready',
                'subject' => 'Your Rental Evaluation [Property_Address] is ready!',
                'scheduled_time' => '1 hour later after submission of the request (during business hours 8am to 5pm)',
                'schedule_desc' => '1 hour later after submission of the request',
                'content' => '
                    <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="height: 28px;">
                                <td class="title" style="font: 24px/28px Arial, Helvetica, sans-serif; color: #292c34; padding: 0px 0px 15px; height: 28px;" align="left" data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;"><span style="color: red;">' . appName() . '</span> Property Management</td>
                            </tr>
                            <tr style="height: 10px;">
                                <td style="height: 10px; border-bottom: 1px solid #eeeeee;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font: 14px/20px Arial, Helvetica, sans-serif; color: #333333; padding: 0px 0px 23px;" align="left" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;">
                                    <p>Hi <strong>[FIRST_NAME]</strong>!</p>
                                    <p>We have completed your rental evaluation.</p>
                                    <p>The rental evaluation is based on the information provided and will give you a good general idea. In order to give you a more accurate estimate we would need a little more information. Details such as availability of parking, improvements, availability of in-suite laundry can affect the rental rate in a significant way.</p>
                                    <p>Would you like to schedule a short call to discuss the details?</p>
                                    <p>It is a little bit easier to have a chat over the phone. I will be happy to answer any of your questions in more detail.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="300" cellspacing="5" cellpadding="5">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-radius: 4px;" align="center" bgcolor="#ed1c24"><a style="font: 15px/20px Arial, Helvetica, sans-serif; color: #fff; text-decoration: none !important; display: inline-block; text-align: center;" href="https://msgsndr.com/widget/appointment/service/30min?group=bolld_consultation">Schedule a FREE Consultation!</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    If you do not need an accurate estimate and are looking for just a general idea, please let me know and I will send you the general estimate rental rate range shortly.<br>
                                    <hr>
                                </td>
                            </tr>
                        </tbody>
                    </table>',
                'command' => 'owner:yourrentalevaluationready',
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => 'After Rental Evaluation Submission',
            ],
            [
                'title' => 'WELCOME EMAIL',
                'slug' => 'welcome-email',
                'subject' => 'Welcome to your new home!',
                'scheduled_time' => null,
                'schedule_desc' => 'After 1 day of TA completion',
                'content' => '
                    <p><img src="https://forrentcentral.com/images/Beesist-Logo.png" width="179" height="62" align="right"></p>
                    <p>&nbsp;</p>
                    <p><strong>Welcome to your new home!</strong></p>
                    <p>We look forward to getting to know you better and helping you with any questions or needs you may have.</p>
                    <p>We understand that being a tenant and renting at a property can be confusing to navigate given that tenancies are governed by regional rules and guidelines, affected by the building itself, and subject to change. We know that settling into a rental property can be a stressful transaction and we want to help in any way that we can. This Welcome Package is to help both parties get off on the right foot.</p>
                    <p>At ' . appName() . ' Real Estate Management we work as a team. We manage our clients properties to safeguard their investments and mitigate any issues that arise in tenancies, repairs, and maintenance. We believe in excellent customer service and we do our best to be responsive and clear in how we work so that everything is properly dealt with the first time.</p>
                    <p>The best place to learn about us is on our <a href="https://forrentcentral.com/">website</a> & <a href="https://bolldpm.com/residents/tenant-guide/">Tenant Guide</a>.
                    You can find everything you need from tenancy insurance, repairs and maintenance requests, and basic knowledge about the Residential Tenancy Act. We believe this greatly benefits not just us as property managers, but also you as tenants.</p>
                    <p>We want you to feel secure in your rental home and at the heart of it, we are committed to maintaining the home and coordinating our responsibilities as property managers, with your responsibility as tenants of the home.</p>
                    <p style="text-align: center;">
                        <a href="https://bolldpm.com/residents/tenant-guide/">
                            <img src="http://forrentcentral.com/img/email/Tenant-guide-button.png" width="345" height="83" data-bx-orig-src="http://forrentcentral.com/img/email/Tenant-guide-button.png">
                        </a>
                    </p>
                    <p><strong>TENANT PORTAL AND COMMUNICATION WITH US</strong></p>
                    <p>We want to make sure that we are there when you need us and you feel that you have direct reliable communication with us all throughout your residency.&nbsp;</p>
                    <p>Our highest priority is to deal with all the issues that might arise during the tenancy as smoothly and effectively as possible. The best way to make sure that your requests are efficiently and clearly addressed is to submit a resident request ticket through our resident portal. Our online portal allows us to be more transparent and to improve communication among the property manager, owner, and tenant.</p>
                    <p>We understand if you may want to reach out to our agent who helped to show you the home and provide you with support prior to your decision to renting this home with us. In all transparency, as our agents main responsibility is to ensure that our portfolio of properties is fully tenanted, in good order, and profitable for our clients, our agents will be out in the field to meet clients, do periodic property inspections, and show rental properties. This means being on the road quite a bit with a great deal of multitasking, and a phone call may not be the best way to reach our managers.</p>
                    <p><strong>For immediate assistance or in case of emergency please call 855-266-8588.</strong></p>
                    <p><strong>SUBMITTING A RESIDENT REQUEST</strong></p>
                    <p>For other general and maintenance inquiries, please make sure to submit a resident request through our resident portal to ensure quick response and follow-up from our team.</p>
                    <p>Your resident portal account is created at the beginning of your tenancy. Your login details are your email address and the password that was generated by the system. A link is sent to you at the time of the setup. If you do not have your password, please click on the link &ldquo;Forgot password&rdquo; and follow the instructions. If you need assistance, please contact us at&nbsp;<a href="mailto:info@forrentcentral.ca">info@forrentcentral.ca</a>&nbsp;and we will be happy to assist you.</p>
                    <p><strong>LOGIN TO OUR&nbsp; PORTAL</strong></p>
                    <p style="text-align: center;">
                        <a href="https://bolld.managebuilding.com/Resident/portal">
                            <img src="https://forrentcentral.com/img/email/Resident-portal-button.png" width="345" height="83" data-bx-orig-src="http://forrentcentral.com/img/email/Resident-guide-button.png">
                        </a>
                    </p>
                    <p>Our portal allows you to:</p>
                    <ul style="list-style-type: circle;">
                        <li>- Review your rent payment history</li>
                        <li>- Change your payment information</li>
                        <li>- Make one time payments</li>
                        <li>- Submit and review progress for your maintenance or general request</li>
                        <li>- View your documents</li>
                    </ul>
                    <p><strong>MOBILE APP FOR THE RESIDENT PORTAL&nbsp;</strong></p>
                    <ul style="list-style-type: circle;">
                        <li>- convenience at your fingertips!&nbsp;</li>
                        <li>- synced for all features available through the online portal</li>
                    </ul>
                    <p>Our portal is available through the mobile app, which can be downloaded through google play or the Apple app store.&nbsp;</p>
                    <p>Go to either the Apple app store or Google Play and search for "Resident Center"</p>
                    <p>Links Provided Here:&nbsp;<a href="https://apps.apple.com/us/app/resident-center/id1466854902">Apple Store</a><a href="https://apps.apple.com/us/app/resident-center/id1466854902">&nbsp;</a>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<a href="https://play.google.com/store/apps/details?id=com.buildium.resident.android">Google Play</a><a href="https://play.google.com/store/apps/details?id=com.buildium.resident.android">&nbsp;</a></p>
                    <p>Download the app on your phone and you`re all set to access the portal through your phone at any time as needed. Please note that you will first need to set the login and activate your account through the online portal, but once you do you`ll be able to access your account through the mobile app.</p>
                    <p><strong><u>G</u><u>ENERAL HOUSEKEEPING TO PREPARE FOR YOUR MOVE IN</u></strong></p>
                    <p>We know that settling into a new home requires careful coordination with lots of small albeit important items, and to help make this process a little easier, we have compiled a move in checklist for quick reference.</p>
                    <p><strong>UTILITIES</strong></p>
                    <p>Unless your tenancy agreement says otherwise, you are responsible for setting up your utility accounts. These are the options for the providers in the area:</p>
                    <ul>
                        <li>Electricity: BC Hydro</li>
                        <li>Gas: Fortis BC</li>
                        <li>Internet/Cable/Landline: Shaw, Telus, Novus</li>
                    </ul>
                    <p>Have a look at our <a href="https://bolldpm.com/residents/tenant-guide/">Tenant Guide</a>&nbsp;to set up your utility accounts online.</p>
                    <p>Please remember to set up your utility accounts prior to your move-in to ensure your unit will be serviced with lighting, heating, and working appliances upon your move-in day.</p>
                    <p><strong>TENANT INSURANCE (Required)</strong></p>
                    <p>As stated in your tenancy agreement, please keep in mind that tenant insurance is required. While we have landlord insurance, this policy does not cover your belongings and personal liability to third parties. Please make sure to email <a href="mailto:info@forrentcentral.ca">info@forrentcentral.ca</a>&nbsp;with a copy of your tenant insurance once secured.</p>
                    <p style="text-align: center;">
                        <a href="https://bolldpm.com/residents/tenant-insurance/">
                            <img src="http://forrentcentral.com/img/email/Tenant-insurance-button.png" width="345" height="83" data-bx-orig-src="http://forrentcentral.com/img/email/Tenant-insurance-button.png">
                        </a>
                    </p>
                    <p><strong>STRATA BYLAWS (for Strata Property only)&nbsp;</strong></p>
                    <p>A copy of the strata bylaws will have been provided to you as a part of our signed tenancy agreement. Please reach out to us through our resident portal if you don&rsquo;t have a copy of this important document!</p>
                    <p>Strata is a management body that has been elected by unit owners to ensure that any building-related matters affecting their strata lot or unit is managed through building bylaws and rules.</p>
                    <p>These rules govern the registration and admittance of new residents at the building, the use of common areas of the building, and coordination of repairs at units that arise due to a building-related maintenance issue.</p>
                    <p>By signing Strata Form K, as a resident of the building, you take responsibility for complying with the building regulations and any inadvertent violation of the bylaws can result in a discretionary fine of $ 200 or more. We highly recommend that you review the bylaws in-depth to be familiarized with what is regulated at the building.</p>
                    <p>Please let us know if you require a copy of the bylaws.</p>
                    <p><strong>STRATA MOVE IN FEE (for Strata Property only)</strong></p>
                    <p>Strata charge an administrative move-in fee for registering a new resident to the building, and setting your contact into the buzzer system for the unit.</p>
                    <p>The strata move-in fee policy and the amount will be as outlined in the strata bylaws.</p>
                    <p>As the unit resident, you will be responsible for submitting any applicable move-in and move-out fees to strata.</p>
                    <p>Please submit payment directly to strata, and email&nbsp;<a href="mailto:info@forrentcentral.ca">info@forrentcentral.ca</a>&nbsp;with a copy of your receipt for payment.</p>
                    <p>For any payment that you make to strata, please make sure to get a receipt to ensure you have a record for payment made.</p>
                    <p><strong>BOOKING THE ELEVATORS FOR MOVE IN (for Strata Property only)</strong></p>
                    <p>Booking the elevators for move-in is managed by strata. Please ensure to book the elevators with them, otherwise, you may find yourself liable for a bylaw violation for an improper move-in.</p>
                    <p>Please review the strata bylaws for the policy for booking the elevators, and reach out to the strata manager in advance to ensure your preferred booking time is secured. As your elevator booking will preferably match with the time that you get keys and have possession of the unit, please coordinate for confirmation from our team for the official move-in walkthrough and provision of property keys prior to confirming a booking.</p>
                    <p><strong><u>OTHER GENERAL INFORMATION</u></strong></p>
                    <p><strong>CONDITION OF THE PROPERTY</strong></p>
                    <p>Before any tenant moves in, we repair anything that may have been broken during the prior tenant&rsquo;s residency. We also hire a professional cleaning service before you move in. It&rsquo;s important to us to provide a fresh start for you. We do expect that the property, at the end of the tenancy, is left in the same condition as when you move in.</p>
                    <p><strong>MOVE-IN DAY</strong></p>
                    <p>It is our responsibility to schedule a move-in inspection that works for everyone. Our team will be reaching out to confirm a scheduled date for our move-in walkthrough and the provision of property keys. On the confirmed date, We will walk through the rental unit together and write down any damages on the inspection report. After the inspection, we&rsquo;ll hand over the keys to your new home.</p>
                    <p><strong>MAINTENANCE &amp; REPAIRS&nbsp;</strong></p>
                    <p>Urgent Repairs - Water Leak, Gas Leak, Fire</p>
                    <p>For a gas leak, please call Fortis BC`s emergency line at 1 800 663 9911 or 911.</p>
                    <p>Urgent Request - Unit Lockout</p>
                    <p>For all emergencies, Call us at 855&shy;-266-&shy;8588.</p>
                    <p>We have Customer Service available 24/7 and your issue will be dealt with quickly and efficiently this way. Urgent repairs are repairs that need to be dealt with the same day to address issues that endanger residents or the property.</p>
                    <p><strong>GENERAL MAINTENANCE AND REPAIRS&nbsp;</strong></p>
                    <p>In order to get your maintenance addressed quickly, please submit your request through our tenant portal to ensure the task is tracked and efficiently addressed by our service team. *Please do not call for general repairs such as laundry issues, or a dripping tap as these repairs get filed in urgency and will need to be properly followed up upon to ensure the appropriate repair is arranged. Property managers will not be able to give you updates over the phone as to when your repair will be scheduled as our service team deals with these tasks and work through the open resident request in Buildium.</p>
                    <p>If damage is caused to the property by the tenant, it is the tenant`s responsibility to pay for the repairs. Anything structural is the owner`s responsibility. We have a handyman we use for repairs that you may use as well. But please note that if you break a physical part of the property it will be deducted from your Security Deposit during your move-out inspection.</p>
                    <p><strong>ONBOARDING WITH US</strong></p>
                    <p>We want to make sure that you are comfortable with the details above, and we are able to answer any questions you may have. You should have received an email from us to schedule an onboarding with you. In this scheduled session, our representative will run through the basics of preparing for tenancy and give a personal tour of your resident portal account. Please confirm through the email date and time that works for you, or please email <a href="mailto:info@forrentcentral.ca">info@forrentcentral.ca</a>&nbsp;directly, subject line*Tenant Onboarding* to schedule.&nbsp;</p>
                    <p>We are pleased and excited to welcome you to your new home and look forward to becoming better acquainted.</p>
                    <p><strong>Warm regards,</strong></p>
                    <p><strong>' . appName() . ' Real Estate Management Team</strong></p>
                    <p>T- 1 (855) 266-8588</p>
                    <p><a href="mailto:info@forrentcentral.ca">info@forrentcentral.ca</a></p>',
                'command' => 'tenant:welcome email',
                'other_reciepients' => null,
                'role' => 'Tenant',
                'notify_trigger' => 'After TA',
            ],
            [
                'title' => 'Rental Evaluation Welcome',
                'slug' => 'rental-evaluation-welcome',
                'subject' => 'Rental Evaluation ([ADDRESS]) Rent For Central Real Estate Management',
                'scheduled_time' => 'After Sending Rental Evaluation Request',
                'schedule_desc' => null,
                'content' => '
                    <p>Your rental evaluation request has been received!</p>
                    <p>We will conduct a comparative market analysis. We compare your rental property with similar properties currently available in the area where your property is located.</p>
                    <p>We will be in touch with you shortly. In the meantime please feel free to reach out if you have any questions.</p>
                    <p>For details of our services and fees please click below.</p>
                    <p><a href="#service_details">SERVICE DETAILS</a></p>
                    <p>Thank you!</p>
                    <h3 id="service_details"><strong>Our Services</strong></h3>
                    <p><strong>Tenant placement</strong></p>
                    <p>Proven marketing strategy will get your property rented faster and at highest market rental rate. The service includes</p>
                    <ul>
                        <li aria-level="1">All advertisement of your property (no extra marketing charges)</li>
                        <li aria-level="1">Professional photographs</li>
                        <li aria-level="1">Timely showings upon request</li>
                        <li aria-level="1">Industry leading background screening of prospects including credit check</li>
                        <li aria-level="1">Signing of an enforceable tenancy agreement and collection of the security deposit and first month&rsquo;s rent</li>
                        <li aria-level="1">Move in inspection with a report including photographs</li>
                    </ul>
                    <h3><strong>Property Management</strong></h3>
                    <p>Full property management service includes:</p>
                    <ul>
                        <li aria-level="1">Timely collection of the rent</li>
                        <li aria-level="1">Monthly and annual statements</li>
                        <li aria-level="1">Access to all documents online</li>
                        <li aria-level="1">Handling of any maintenance requests</li>
                        <li aria-level="1">Communication and cooperation with your strata corporation</li>
                        <li aria-level="1">Enforcement of Residential Tenancy Act and handling of any disputes</li>
                        <li aria-level="1">Quarterly inspections</li>
                        <li aria-level="1">Non Resident Tax filing</li>
                    </ul>
                    <h4><strong>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</strong></h4>
                    <h3><strong>&ldquo;Efficiency of our procedures and the use of advanced technology are the keys to a superior service at reasonable rates&rdquo;</strong></h3>
                    <h3><strong>Our Fees</strong></h3>
                    <h3><strong>Tenant placement</strong></h3>
                    <ul>
                        <li aria-level="1">45% of one month&rsquo;s rent for any house or condo with full property management</li>
                    </ul>
                    <h3><strong>Property management unfurnished properties</strong></h3>
                    <ul>
                        <li aria-level="1">6% of gross rent per month or a minimum of $80 plus GST for a condo/townhouse or a minimum of $120 plus GST for a house, whichever is greater</li>
                        <li aria-level="1">management fee applicable only when property rented</li>
                    </ul>
                    <h4><strong>All fees are payable only when your property is rented. There are no hidden fees or extra charges.</strong></h4>
                    <p>Usually the last week of previous month and the first week of the month prior to the desired tenant placement date are the best times to find a prospective tenant. In case that you are planning to rent your property within 1 month, it is crucial to start advertising as soon as possible.</p>',
                'command' => null,
                'other_reciepients' => null,
                'role' => 'Property Owner',
                'notify_trigger' => null,
            ],
        ];

        foreach ($emailTemplates as $key => $value) {
            $templates = new EmailTemplate();
            $templates->title = $value['title'];
            $templates->slug = $value['slug'];
            $templates->subject = $value['subject'];
            $templates->scheduled_time = $value['scheduled_time'];
            $templates->schedule_desc = $value['schedule_desc'];
            $templates->content = $value['content'];
            $templates->command = $value['command'];
            $templates->other_reciepients = $value['other_reciepients'];
            $templates->role = $value['role'];
            $templates->notify_trigger = $value['notify_trigger'];
            $templates->save();
        }
        $this->enableForeignKeys();
    }
}
