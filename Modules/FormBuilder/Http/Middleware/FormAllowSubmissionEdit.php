<?php

namespace Modules\FormBuilder\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\FormBuilder\Entities\Submission;

class FormAllowSubmissionEdit
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $submission_id = $request->route('my_submission');

        $user = $request->user();
        $submission = Submission::where(['user_id' => $user->id, 'id' => $submission_id])->firstOrFail();

        if (! $submission->form->allowsEdit()) {
            // this form does not allow edit
            return redirect()
                ->route('formbuilder::my-submissions.show', $submission->id)
                ->with('error', "Form '{$submission->form->name}' does not allow submission edit.");
        }

        return $next($request);
    }
}
