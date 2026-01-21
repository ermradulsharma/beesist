<?php

namespace Modules\Leads\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\RentalEvaluation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Leads\Notifications\RentalEvaluationNotification;

class RentalEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leads::backend.rental-evaluation.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function evaluationForm(Request $request, $id = null)
    {
        if ($request->isMethod('POST')) {
            $logo = '<img style="max-height: 80px; width: auto;" src="' . asset('images/Beesist-Logo.png') . '" alt="Logo" width="auto" height="80">';
            $content = str_replace("[LOGO]", $logo, $request->content);
            $subject = str_replace("[address]", $request->address, $request->subject);
            $user = User::where('email', $request->recipient)->first();
            if (!$user) {
                $user = new User();
                $user->email = $request->recipient;
                $user->name = $request->name;
            }
            $user->notify(new RentalEvaluationNotification($content, $subject))->onQueue('default');
            $accountId = Auth::id();
            RentalEvaluation::updateOrCreate(
                ['id' => $request->id, 'first_name' => $request->name, 'email' => $request->recipient, 'address' => $request->address, 'unit_no' => $request->listing_number],
                ['account_id' => $accountId, 'name' => $request->name, 'email' => $request->recipient, 'phone' => $request->phone, 'address' => $request->address, 'unit_no' => $request->listing_number, 'bedrooms' => $request->beds, 'bathrooms' => $request->baths, 'square_footage' => $request->area, 'status' => '1']
            );
            return redirect()->route(rolebased() . '.rental_evaluation.index')->withFlashSuccess('Rental Evalution Report Sent Successfully');
        }
        $address = $listing_number = $beds = $baths = $area = $rate = $name = $email = $phone = $req_id = $subject = $content = '';
        $action = 'show';
        $report = null;
        if (isset($request->address, $request->listing_number, $request->beds, $request->baths, $request->area, $request->rate)) {
            $action = 'post';
            $address = $request->address;
            $listing_number = $request->listing_number;
            $beds = $request->beds;
            $baths = $request->baths;
            $area = $request->area;
            $rate = $request->rate;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $req_id = $request->id;
        }
        if ($id) {
            $report = RentalEvaluation::find($id);
            $action = 'show';
            $address = $report->address;
            $listing_number = $report->unit_no;
            $beds = $report->bedrooms;
            $baths = $report->bathrooms;
            $area = $report->square_footage;
            $rate = $report->rate;
            $name = $report->first_name . ' ' . $report->last_name;
            $email = $report->email;
            $phone = $report->phone;
            $req_id = $report->id;
        }
        $data = EmailTemplate::where('title', 'Rental Evaluation Report')->first();
        if ($data) {
            $content = str_replace("[address]", $address, $data->content);
            $content = str_replace("[first_name]", $name, $content);
            $content = str_replace("[listing_number]", $listing_number, $content);
            $content = str_replace("[beds]", $beds, $content);
            $content = str_replace("[baths]", $baths, $content);
            $content = str_replace("[area]", $area, $content);
            $content = str_replace("[rate]", $rate, $content);
            $logo = '<img style="max-height: 80px; width: auto;" src="' . asset('images/Beesist-Logo.png') . '" alt="Logo" width="auto" height="80">';
            $content = str_replace("[LOGO]", $logo, $content);
            $subject = str_replace("[address]", $address, $data->subject);
        }


        return view('leads::backend.rental-evaluation.form', compact('data', 'report', 'subject', 'content', 'action', 'address', 'listing_number', 'beds', 'baths', 'area', 'rate', 'name', 'email', 'req_id', 'phone'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('leads::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('leads::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
