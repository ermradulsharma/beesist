<?php

namespace Modules\FormBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FormBuilder\Entities\Form;
use Modules\FormBuilder\Entities\Submission;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index($form_id)
    {
        $user = auth()->user();

        $form = Form::where(['user_id' => $user->id, 'id' => $form_id])
            ->with(['user'])
            ->firstOrFail();

        $submissions = $form->submissions()
            ->with('user')
            ->latest()
            ->paginate(100);

        // get the header for the entries in the form
        $form_headers = $form->getEntriesHeader();

        $pageTitle = "Submitted Entries for '{$form->name}'";

        return view(
            'formbuilder::submissions.index',
            compact('form', 'submissions', 'pageTitle', 'form_headers')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('formbuilder::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($form_id, $submission_id)
    {
        $submission = Submission::with('user', 'form')
            ->where([
                'form_id' => $form_id,
                'id' => $submission_id,
            ])
            ->firstOrFail();

        $form_headers = $submission->form->getEntriesHeader();

        $pageTitle = 'View Submission';

        return view('formbuilder::submissions.show', compact('pageTitle', 'submission', 'form_headers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('formbuilder::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($form_id, $submission_id)
    {
        $submission = Submission::where(['form_id' => $form_id, 'id' => $submission_id])->firstOrFail();
        $submission->delete();

        return redirect()
            ->route('formbuilder::forms.submissions.index', $form_id)
            ->with('success', 'Submission successfully deleted.');
    }
}
