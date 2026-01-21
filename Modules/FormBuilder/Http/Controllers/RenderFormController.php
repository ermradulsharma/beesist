<?php

namespace Modules\FormBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\FormBuilder\Entities\Form;
use Modules\FormBuilder\Entities\Helper;
use Throwable;

class RenderFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('public-form-access');
    }

    /**
     * Render the form so a user can fill it
     *
     * @param  string  $identifier
     * @return Response
     */
    public function render($identifier)
    {
        $form = Form::where('identifier', $identifier)->firstOrFail();
        $pageTitle = "{$form->name}";

        return view('formbuilder::render.index', compact('form', 'pageTitle'));
    }

    /**
     * Process the form submission
     *
     * @param  string  $identifier
     * @return Response
     */
    public function submit(Request $request, $identifier)
    {
        $source_route = app('router')->getRoutes(url()->previous())->match(app('request')->create(url()->previous()))->getName();
        $form = Form::where('identifier', $identifier)->firstOrFail();

        DB::beginTransaction();

        try {
            $input = $request->except('_token');

            // check if files were uploaded and process them
            $uploadedFiles = $request->allFiles();
            foreach ($uploadedFiles as $key => $file) {
                // store the file and set it's path to the value of the key holding it
                if ($file->isValid()) {
                    $input[$key] = $file->store('fb_uploads', 'public');
                }
            }

            $user_id = auth()->user()->id ?? null;

            $form->submissions()->create([
                'user_id' => $user_id,
                'content' => $input,
            ]);

            DB::commit();

            if ($source_route == 'formbuilder::form.render') {
                return redirect()
                    ->route('formbuilder::form.feedback', $identifier)
                    ->with('success', 'Form successfully submitted.');
            } else {
                return response()->json(['flash_success' => 'Form successfully submitted.', 'redirect' => $form->redirect_url ? $form->redirect_url : '']);
            }

        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return back()->withInput()->with('error', Helper::wtf());
        }
    }

    /**
     * Display a feedback page
     *
     * @param  string  $identifier
     * @return Response
     */
    public function feedback($identifier)
    {
        $form = Form::where('identifier', $identifier)->firstOrFail();

        $pageTitle = 'Form Submitted!';

        return view('formbuilder::render.feedback', compact('form', 'pageTitle'));
    }
}
