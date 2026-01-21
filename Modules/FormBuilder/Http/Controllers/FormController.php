<?php

namespace Modules\FormBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\FormBuilder\Entities\Form;
use Modules\FormBuilder\Entities\Helper;
use Modules\FormBuilder\Events\Form\FormCreated;
use Modules\FormBuilder\Events\Form\FormDeleted;
use Modules\FormBuilder\Events\Form\FormUpdated;
use Modules\FormBuilder\Http\Requests\SaveFormRequest;
use Throwable;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $pageTitle = 'Forms';
        $forms = Form::getForUser(auth()->user());

        return view('formbuilder::forms.index', compact('pageTitle', 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $pageTitle = 'Create New Form';
        $saveURL = route('formbuilder::forms.store');
        $form_roles = Helper::getConfiguredRoles();

        return view('formbuilder::forms.create', compact('pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Renderable
     */
    public function store(SaveFormRequest $request)
    {
        $user = $request->user();
        $input = $request->merge(['user_id' => $user->id])->except('_token');
        DB::beginTransaction();
        // generate a random identifier
        $input['identifier'] = $user->id.'-'.Helper::randomString(20);
        $created = Form::create($input);

        try {
            // dispatch the event
            event(new FormCreated($created));
            DB::commit();

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully created!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } catch (Throwable $e) {
            info($e);
            DB::rollback();

            return response()->json(['success' => false, 'details' => 'Failed to create the form.']);
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])
            ->with('user')
            ->withCount('submissions')
            ->firstOrFail();
        $pageTitle = 'Preview Form';

        return view('formbuilder::forms.show', compact('pageTitle', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $pageTitle = 'Edit Form';
        $saveURL = route('formbuilder::forms.update', $form);
        $form_roles = Helper::getConfiguredRoles();

        return view('formbuilder::forms.edit', compact('form', 'pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Renderable
     */
    public function update(SaveFormRequest $request, $id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $input = $request->except('_token');
        if ($form->update($input)) {
            event(new FormUpdated($form));

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully updated!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } else {
            response()->json(['success' => false, 'details' => 'Failed to update the form.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $form->delete();
        event(new FormDeleted($form));

        return back()->with('success', "'{$form->name}' deleted.");
    }
}
