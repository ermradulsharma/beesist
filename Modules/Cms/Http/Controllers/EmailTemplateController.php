<?php

namespace Modules\Cms\Http\Controllers;

use App\Domains\Auth\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Entities\EmailTemplate;
use Spatie\Permission\Models\Role;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('cms::email-template.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $email_template = new EmailTemplate;
        $roles = [];
        if (Auth::user()->hasAllAccess()) {
            $roles = Role::where('name', 'Property Manager')->pluck('name');
        } elseif (Auth::user()->hasAManagerAccess()) {
            
            $roles = Role::where('name', 'Agent')->pluck('name');
        } else {
            $roles = Role::all()->pluck('name');
        }
        $users = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->get();
        return view('cms::email-template.create', compact('email_template', 'roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        $emailTemplateObj = new EmailTemplate;
        $emailTemplateObj->title = $request->title;
        $emailTemplateObj->subject = $request->subject;
        $emailTemplateObj->content = $request->content;
        $emailTemplateObj->scheduled_time = $request->scheduled_time;
        $emailTemplateObj->schedule_desc = $request->schedule_desc;
        $emailTemplateObj->command = $request->command;
        $emailTemplateObj->other_reciepients = json_encode($request->other_recipients);
        // $emailTemplateObj->role = $request->role;
        $emailTemplateObj->notify_trigger = $request->notify_trigger;
        // $emailTemplateObj->seo = json_encode($request->seo);
        // $emailTemplateObj->customScript = json_encode($request->customScript);
        $emailTemplateObj->is_active = $request->is_active ?? 0;
        $emailTemplateObj->save();
        return redirect()->route('admin.cms.emailTemplate.index')->withFlashSuccess(__('The Email Template was successfully created.'));
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        // return $id;
        $email_template = EmailTemplate::find($id);
        $roles = [];
        if (Auth::user()->hasAllAccess()) {
            $roles = Role::where('name', 'Property Manager')->pluck('name');
        } elseif (Auth::user()->hasAManagerAccess()) {
            $roles = Role::where('name', 'Agent')->pluck('name');
        } else {
            $roles = Role::all()->pluck('name');
        }
        $users = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->get();

        return view('cms::email-template.create', compact('email_template', 'roles', 'users'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, EmailTemplate $email_template)
    {

        $emailTemplateObj = EmailTemplate::find($request->form_id);
        $emailTemplateObj->title = $request->title;
        $emailTemplateObj->subject = $request->subject;
        $emailTemplateObj->content = $request->content;
        $emailTemplateObj->scheduled_time = $request->scheduled_time;
        $emailTemplateObj->schedule_desc = $request->schedule_desc;
        $emailTemplateObj->command = $request->command;
        $emailTemplateObj->other_reciepients = json_encode($request->other_recipients);
        // $emailTemplateObj->role = $request->role;
        $emailTemplateObj->notify_trigger = $request->notify_trigger;
        $emailTemplateObj->is_active = $request->is_active ?? 0;
        $emailTemplateObj->save();
        return redirect()->route('admin.cms.emailTemplate.index')->withFlashSuccess(__('The Email Template was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
