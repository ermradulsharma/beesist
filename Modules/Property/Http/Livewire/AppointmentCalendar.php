<?php

namespace Modules\Property\Http\Livewire;

use App\Domains\Auth\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Leads\Entities\Appointment;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\ShowingApplication;
use Modules\Property\Notifications\AppointmentNotification;

class AppointmentCalendar extends Component
{
    public $startDate;
    public $endDate;
    public $activeEvent;
    public $accountId = null;
    public $agentId = null;
    public $events = [];
    public $account_id = null;
    public $eventId = null;
    #[Validate('required|min:5')]
    public $appointment_title = null;

    #[Validate('required')]
    public $user_id = null;

    #[Validate('required_if:type,Inspection')]
    public $property_id = null;

    #[Validate('required')]
    public $appointment_date = null;

    #[Validate('required|min:5')]
    public $first_name = null;

    #[Validate('required')]
    public $last_name = null;

    #[Validate('required|email')]
    public $email = null;

    #[Validate('required')]
    public $phone = null;

    public $location = null;
    public $type = null;
    public $unit_number = null;
    public $comments = null;

    public function mount()
    {
        $this->startDate = now()->startOfMonth();
        $this->endDate = now()->endOfMonth();
        $this->accountId = null;
        $this->agentId = null;
        $this->getEvents();
    }

    public function updatedAccountId($value)
    {
        $this->accountId = $value;
        $this->clearCache();
        $this->getEvents();
        $this->dispatch('DOMContentLoaded');
    }

    public function updatedAgentId($value)
    {
        $this->agentId = $value;
        $this->accountId = null;
        $this->clearCache();
        $this->getEvents();
        $this->dispatch('DOMContentLoaded');
    }

    public function setEvent($event, $type)
    {
        if (in_array($type, ['Inspection', 'Appointment'])) {
            $our_event = Appointment::where('id', $event['id'])->firstOrFail();
        } else {
            $our_event = ShowingApplication::where('id', $event['id'])->firstOrFail();
        }
        $this->activeEvent = $our_event;
    }

    public function saveAppointment()
    {
        $this->validate();
        $data = $this->only(['appointment_title', 'user_id', 'appointment_date', 'first_name', 'last_name', 'email', 'phone', 'location', 'unit_number', 'comments', 'type']);
        $data['account_id'] = auth()->user()->id;
        if ($this->eventId) {
            Appointment::where('id', $this->eventId)->update($data);
            $subject = "Appointment Updated: {$data['appointment_title']} from " . config('app.name') . ".";
            $type = 'updated';
        } else {
            Appointment::create($data);
            $subject = "Appointment Confirmation: {$data['appointment_title']} from " . config('app.name') . ".";
            $type = 'successfully scheduled';
        }

        // Notification For Manager/Agent
        $userObj = User::find($data['user_id']);
        $name = $userObj->name ?? $userObj->first_name;
        $message = $this->appointmentMessage($data, "{$data['first_name']} {$data['last_name']}",  $type);
        $userObj->notify(new AppointmentNotification($name, $subject, $message));

        // Notification For Appointment with
        $msg = $this->appointmentMessage($data, $name,  $type);
        $appointmentDetails = User::where('email', $data['email'])->first();
        if (!$appointmentDetails) {
            $appointmentDetails = new User();
            $appointmentDetails->first_name = $data['first_name'];
            $appointmentDetails->last_name = $data['last_name'];
            $appointmentDetails->email = $data['email'];
        }
        $appointmentDetails->notify(new AppointmentNotification("{$data['first_name']} {$data['last_name']}", $subject, $msg));
        $this->reset();
        $this->clearCache();
        $this->getEvents();
        $this->dispatch('DOMContentLoaded');
        $this->dispatch('closeAppointmentPopup');
    }

    private function appointmentMessage($data, $scheduledWithName = null,  $type)
    {
        $message = "<p>We are pleased to inform you that an appointment '<strong>{$data['appointment_title']}</strong>' has been {$type} with '<strong>{$scheduledWithName}</strong>' on '<strong>{$data['appointment_date']}</strong>'.</p>";
        $message .= "<p>Please find the appointment details below:</p>";
        $message .= "<ul>";
        $message .= "<li><strong>Date/Time:</strong> {$data['appointment_date']}</li>";
        $message .= "<li><strong>Address:</strong> {$data['location']}</li>";
        if ($data['unit_number']) {
            $message .= "<li><strong>Unit Number:</strong> {$data['unit_number']}</li>";
        }
        if ($data['comments']) {
            $message .= "<li><strong>Comments:</strong> {$data['comments']}</li>";
        }
        $message .= "</ul>";
        return $message;
    }

    private function inspectionMessage($data, $scheduledWithName = null, $propertyObj, $type)
    {
        $message = "<p>We are pleased to inform you that an inspection appointment '<strong>{$data['appointment_title']}</strong>' has been {$type} with '<strong>{$scheduledWithName}</strong>' on '<strong>{$data['appointment_date']}</strong>'.</p>";
        $message .= "<p>Please find the inspection details below:</p>";
        $message .= "<ul>";
        $message .= "<li><strong>Date/Time:</strong> {$data['appointment_date']}</li>";
        $message .= "<li><strong>Property:</strong> {$propertyObj->title}</li>";
        $message .= "<li><strong>Property Address:</strong> {$propertyObj->address}</li>";
        if ($data['comments']) {
            $message .= "<li><strong>Comments:</strong> {$data['comments']}</li>";
        }
        $message .= "</ul>";
        return $message;
    }


    public function saveInspection()
    {
        $this->validate();
        $data = $this->only(['appointment_title', 'user_id', 'property_id', 'appointment_date', 'first_name', 'last_name', 'email', 'phone', 'comments', 'type']);
        $data['account_id'] = auth()->user()->id;
        if ($this->eventId) {
            Appointment::where('id', $this->eventId)->update($data);
            $subject = "Inspection Updated: {$data['appointment_title']} from " . config('app.name') . ".";
            $type = 'updated';
        } else {
            Appointment::create($data);
            $subject = "Inspection Confirmation: {$data['appointment_title']} from " . config('app.name') . ".";
            $type = 'successfully scheduled';
        }
        $propertyObj = Property::find($data['property_id']);

        // Notification For Manager/Agent
        $userObj = User::find($data['user_id']);
        $name = $userObj->name ?? $userObj->first_name;
        $message = $this->inspectionMessage($data, "{$data['first_name']} {$data['last_name']}", $propertyObj, $type);
        $userObj->notify(new AppointmentNotification($name, $subject, $message));

        // Notification For Appointment with
        $msg = $this->inspectionMessage($data, $name, $propertyObj, $type);
        $appointmentDetails = User::where('email', $data['email'])->first();
        if (!$appointmentDetails) {
            $appointmentDetails = new User();
            $appointmentDetails->first_name = $data['first_name'];
            $appointmentDetails->last_name = $data['last_name'];
            $appointmentDetails->email = $data['email'];
        }
        $appointmentDetails->notify(new AppointmentNotification("{$data['first_name']} {$data['last_name']}", $subject, $msg));
        $this->reset();
        $this->clearCache();
        $this->getEvents();
        $this->dispatch('DOMContentLoaded');
        $this->dispatch('closeInspectionPopup');
    }

    public function deleteAppointment($id)
    {
        $data = Appointment::find($id);
        $type = 'cancled';
        $userObj = User::find($data['user_id']);
        $name = $userObj->name ?? $userObj->first_name;
        $subject = "{$data['type']} Canceled: {$data['appointment_title']} from " . config('app.name') . ".";
        if ($data['property_id'] !== 0 && $data['type'] == 'Inspection') {
            $propertyObj = Property::find('property_id');
            $propertyObj = Property::find($data['property_id']);
            if ($propertyObj) {
                $message = $this->inspectionMessage($data, "{$data['first_name']} {$data['last_name']}", $propertyObj, $type);
                $msg = $this->inspectionMessage($data, $name, $propertyObj, $type);
            } else {
                $message = $this->appointmentMessage($data, "{$data['first_name']} {$data['last_name']}", $type);
                $msg = $this->appointmentMessage($data, $name, $type);
            }
        } else {
            $message = $this->appointmentMessage($data, "{$data['first_name']} {$data['last_name']}",  $type);
            $msg = $this->appointmentMessage($data, $name,  $type);
        }
        $userObj->notify(new AppointmentNotification($name, $subject, $message));

        $appointmentDetails = User::where('email', $data['email'])->first();
        if (!$appointmentDetails) {
            $appointmentDetails = new User();
            $appointmentDetails->first_name = $data['first_name'];
            $appointmentDetails->last_name = $data['last_name'];
            $appointmentDetails->email = $data['email'];
        }
        $appointmentDetails->notify(new AppointmentNotification("{$data['first_name']} {$data['last_name']}", $subject, $msg));

        $this->dispatch('closetooltipPopup');
        $data->delete();
        $this->reset();
        $this->clearCache();
        $this->getEvents();
        $this->dispatch('DOMContentLoaded');
    }

    public function editAppointment($id)
    {
        $data = Appointment::find($id);
        $this->dispatch('editAppointmentPopup', $data);
        if ($data->type == 'Appointment') {
            $this->setAppointmentData($data);
        } else {
            $this->setInspectionData($data);
        }

        $this->dispatch('closetooltipPopup');
    }

    public function setAppointmentData($data)
    {
        $this->appointment_title = $data['appointment_title'];
        $this->user_id = $data['user_id'];
        $this->appointment_date = $data['appointment_date'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->location = $data['location'];
        $this->unit_number = $data['unit_number'];
        $this->comments = $data['comments'];
        $this->type = $data['type'];
        $this->eventId = $data['id'];
    }

    public function setInspectionData($data)
    {
        $this->appointment_title = $data['appointment_title'];
        $this->property_id = $data['property_id'];
        $this->user_id = $data['user_id'];
        $this->appointment_date = $data['appointment_date'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->comments = $data['comments'];
        $this->type = $data['type'];
        $this->eventId = $data['id'];
    }

    public function getEvents()
    {
        $startDate = $this->startDate;
        $endDate = $this->endDate;
        $accountId = $this->accountId;
        $events = Cache::remember('user-events-' . auth()->id() . '-' . base64_encode($startDate . $endDate . $accountId), 0/*now()->addHour()*/, function () use ($accountId) {
            $events = [];
            $global_events = $appointments = $inspections = [];
            $user = Auth::user();
            if ($user->hasAllAccess() && $accountId == null) {
                $global_events = ShowingApplication::query()->whereNotNull('showing_id')->get();
                $appointments = Appointment::query()->where('type', 'Appointment')->where('status', 1)->get();
                $inspections = Appointment::query()->where('type', 'Inspection')->where('status', 1)->get();
            } elseif ($accountId && $user->hasAllAccess()) {
                $entityIds = UserEntity::query()->where('entity_key', 'propertyShowing')->where('account_id', $accountId)->pluck('entity_value');
                $global_events = ShowingApplication::whereNotNull('showing_id')->whereIn('showing_id', $entityIds)->get();
                $appointments = Appointment::query()->where('type', 'Appointment')->where('status', 1)->where(function ($query) use ($accountId) {
                    $query->where('user_id', $accountId)->orWhere('account_id', $accountId);
                })->get();
                $inspections = Appointment::query()->where('type', 'Inspection')->where('status', 1)->where(function ($query) use ($accountId) {
                    $query->where('user_id', $accountId)->orWhere('account_id', $accountId);
                })->get();
            } elseif ($user->hasManagerAccess()) {
                $entityIds = UserEntity::query()->where('entity_key', 'propertyShowing')->where('account_id', $user->id)->pluck('entity_value');
                $global_events = ShowingApplication::whereNotNull('showing_id')->whereIn('showing_id', $entityIds)->get();
                $appointments = Appointment::query()->where('type', 'Appointment')->where('status', 1)->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id)->orWhere('account_id', $user->id);
                })->get();
                $inspections = Appointment::query()->where('type', 'Inspection')->where('status', 1)->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id)->orWhere('account_id', $user->id);
                })->get();
            } elseif ($user->hasRole('Agent')) {
                $global_events = ShowingApplication::whereNotNull('showing_id')->where('agent_id', $user->id)->get();
                $appointments = Appointment::query()->where('type', 'Appointment')->where('status', 1)->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id)->orWhere('account_id', $user->id);
                })->get();
                $inspections = Appointment::query()->where('type', 'Inspection')->where('status', 1)->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id)->orWhere('account_id', $user->id);
                })->get();
            } elseif ($user->hasRole('Tenant')) {
                $global_events = ShowingApplication::whereNotNull('showing_id')->where('tenant_id', $user->id)->get();
            }
            // dd($appointments);
            foreach ($global_events as $global_event) {
                $agent = $global_event->agent ? $global_event->agent->name : 'N/A';
                $url = route(rolebased() . '.showings.requests', $global_event->showing_id);
                $property = $global_event->property->title;
                $content = '<div><b>Showing Date:</b><br> ' . \Timezone::convertToLocal(Carbon::parse($global_event->showing_date)) . "</div><div><b>Property:</b> {$property}</div><div><b>Agent:</b> {$agent}</div><div class='mb-2'><b>Showing Type:</b> {$global_event->showing_type}</div><h5>Tenant Details:</h5><div><b>Name:</b> {$global_event->first_name} {$global_event->last_name}</div><div><b>Email:</b> {$global_event->email}</div><div class='mb-2'><b>Phone:</b> {$global_event->phone}</div><div class='mb-2'><b>Comments:</b><br> {$global_event->comments}</div><div class='inline-buttons'><a href='{$url}' target='_blank' data-aos='fade-up' data-aos-duration='1000' class='btn btn-primary'>View Details</a></div>";
                $event = [
                    'id' => $global_event->id,
                    'title' => '[SH] ' . $global_event->property->title,
                    'start' => $global_event->showing_date,
                    'end' => $global_event->showing_date,
                    'url' => route(rolebased() . '.showings.requests', $global_event->showing_id),
                    'backgroundColor' => Carbon::now()->lte(Carbon::parse($global_event->showing_date)) ? 'green' : 'red',
                    'eventBorderColor' => Carbon::now()->lte(Carbon::parse($global_event->showing_date)) ? 'green' : 'red',
                    'extendedProps' => [
                        'type' => $global_event->showing_type,
                        'content' => $content,
                        'agent' => $global_event->agent ? $global_event->agent->name : 'N/A',
                    ],
                ];

                $events[] = $event;
            }

            foreach ($appointments as $appointment) {
                $delete_btn = null;
                $edit_btn = null;
                if ($appointment->account_id == Auth::user()->id) {
                    $delete_btn = "<div><button type='button' class='btn btn-danger' wire:click='deleteAppointment({$appointment->id})' wire:confirm='Are you sure you want to delete this appointment?' style='width: 84px;'><i class='fas fa-trash'></i> Delete </button></div>";
                    $edit_btn = "<div><button type='button' class='btn btn-success' wire:click='editAppointment({$appointment->id})' style='width: 84px;'><i class='fas fa-pen'></i> Edit </button></div>";
                }
                $content = "<div class='mb-2'><b>Appointment Date:</b><br> " . e(\Timezone::convertToLocal(Carbon::parse($appointment->appointment_date))) . "</div>";
                $content .= "<h5>Appointment with:</h5>";
                $content .= "<div><b>Name:</b> " . e($appointment->first_name) . " " . e($appointment->last_name) . "</div>";
                $content .= "<div><b>Email:</b> " . e($appointment->email) . "</div>";
                $content .= "<div><b>Phone:</b> " . e($appointment->phone) . "</div>";
                $content .= "<div><b>Location:</b> " . e($appointment->location) . "</div>";
                $content .= "<div class='mb-2'><b>Unit #:</b> " . e($appointment->unit_number) . "</div>";
                $content .= "<div class='mb-2'><b>Comments:</b><br> " . e($appointment->comments) . "</div>";
                $content .= "<div class='row justify-content-between mx-0'>" . $edit_btn . $delete_btn . "</div>";
                // $content = "<div class='mb-2'><b>Appointment Date:</b><br> " . \Timezone::convertToLocal(Carbon::parse($appointment->appointment_date)) . "</div><h5>Appointment with:</h5><div><b>Name:</b> {$appointment->first_name} {$appointment->last_name}</div><div><b>Email:</b> {$appointment->email}</div><div><b>Phone:</b> {$appointment->phone}</div><div><b>Location:</b> {$appointment->location}</div><div class='mb-2'><b>Unit #:</b> {$appointment->unit_number}</div><div class='mb-2'><b>Comments:</b><br> {$appointment->comments}</div>" . $delete_btn . $edit_btn;
                $event = [
                    'id' => $appointment->id,
                    'title' => '[AP] ' . $appointment->appointment_title,
                    'start' => $appointment->appointment_date,
                    'end' => $appointment->appointment_date,
                    'url' => '',
                    'backgroundColor' => Carbon::now()->lte(Carbon::parse($appointment->appointment_date)) ? 'blue' : 'red',
                    'eventBorderColor' => Carbon::now()->lte(Carbon::parse($appointment->appointment_date)) ? 'blue' : 'red',
                    'extendedProps' => [
                        'type' => $appointment->type,
                        'content' => $content,
                        'user' => $appointment->user_details ? $appointment->user_details->name : 'N/A',
                    ],
                ];

                $events[] = $event;
            }

            foreach ($inspections as $appointment) {
                $delete_btn = null;
                $edit_btn = null;
                if ($appointment->account_id == auth()->user()->id) {
                    $delete_btn = "<div><button type='button' class='btn btn-danger' wire:click='deleteAppointment({$appointment->id})' wire:confirm='Are you sure you want to delete this inspection?'><i class='fas fa-trash'></i> Delete</button></div>";
                    $edit_btn = "<div><button type='button' class='btn btn-success' wire:click='editAppointment({$appointment->id})' style='width: 84px;'><i class='fas fa-pen'></i> Edit </button></div>";
                }
                $content = '<div><b>Inspection Date:</b><br> ' . \Timezone::convertToLocal(Carbon::parse($appointment->appointment_date)) . "</div><div><b>Property:</b> {$appointment->property?->title}</div><div class='mb-2'><b>Agent:</b> {$appointment->user_detail->name}</div><h5>Inspection with:</h5><div><b>Name:</b> {$appointment->first_name} {$appointment->last_name}</div><div><b>Email:</b> {$appointment->email}</div><div class='mb-2'><b>Phone:</b> {$appointment->phone}</div><div class='mb-2'><b>Comments:</b><br> {$appointment->comments}</div><div class='row justify-content-between mx-0'>" . $edit_btn . $delete_btn . "</div>";
                $event = [
                    'id' => $appointment->id,
                    'title' => '[IN] ' . $appointment->appointment_title,
                    'start' => $appointment->appointment_date,
                    'end' => $appointment->appointment_date,
                    'url' => '',
                    'backgroundColor' => Carbon::now()->lte(Carbon::parse($appointment->appointment_date)) ? 'blue' : 'red',
                    'eventBorderColor' => Carbon::now()->lte(Carbon::parse($appointment->appointment_date)) ? 'blue' : 'red',
                    'extendedProps' => [
                        'type' => $appointment->type,
                        'content' => $content,
                        'user' => $appointment->user_detail ? $appointment->user_detail->name : 'N/A',
                    ],
                ];

                $events[] = $event;
            }

            return $events;
        });

        return $events;
    }

    public function clearCache()
    {
        Cache::forget('user-events-' . auth()->id() . '-' . base64_encode($this->startDate . $this->endDate . $this->accountId));
    }

    public function render()
    {
        $agents = $subscribers = $properties = [];
        if (Auth::user()->hasAllAccess()) {
            $subscribers = Subscription::where('stripe_status', 'active')->get();
            $agents = User::whereHas('roles', function ($query) {
                $query->where('name', 'Agent');
            })->onlyActive()->select(['id', 'first_name', 'last_name', 'name'])->get();
            $properties = Property::where('status', 1)->get();
        } elseif (Auth::user()->hasManagerAccess()) {
            $agent_ids = UserEntity::where('entity_key', 'Agent')->where('account_id', auth()->user()->id)->pluck('entity_value');
            $agents = User::whereIn('id', $agent_ids)->onlyActive()->select(['id', 'first_name', 'last_name', 'name'])->get();
            $property_ids = UserEntity::where('entity_key', 'Property')->where('account_id', auth()->user()->id)->pluck('entity_value');
            $properties = Property::whereIn('id', $property_ids)->where('status', 1)->get();
        }

        return view('property::livewire.appointment-calendar', compact('subscribers', 'agents', 'properties'));
    }
}
