<?php

namespace Modules\RentalApplication\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\RentalApplication\Entities\ScreeningQuestion;

class AddScreeningQuestionModal extends Component
{
    public $showId;
    public $title;
    public $question_type;
    public $field_type;
    public $status;
    public $pm_id;
    protected $listeners = ['openModal'];

    protected $rules = [
        'title' => 'required|string',
        'question_type' => 'required|string',
        'field_type' => 'required|string',
        'status' => 'nullable|boolean',
    ];

    public function __construct()
    {
        // parent::__construct();
        $this->pm_id = Auth::id(); // Set default value to the ID of the authenticated user
    }

    public function render()
    {
        $data = [
            'showId' => $this->showId,
            'title' => $this->title,
            'pm_id' => $this->pm_id,
            'question_type' => $this->question_type,
            'field_type' => $this->field_type,
            'status' => $this->status,
        ];

        return view('rentalapplication::livewire.add-screening-question-modal', compact('data'));
    }

    public function openModal($data)
    {
        $this->showId = $data['showId'];
        $this->title = $data['title'];
        $this->question_type = $data['question_type'];
        $this->field_type = $data['field_type'];
        $this->status = $data['status'];
    }

    public function submit()
    {
        $this->validate();

        if (! empty($this->showId)) {
            ScreeningQuestion::find($this->showId)->update([
                'title' => $this->title,
                'pm_id' => Auth::user()->hasAllAccess() ? null : Auth::id(),
                'question_type' => $this->question_type,
                'field_type' => $this->field_type,
                'status' => $this->status,
            ]);
            $msg = 'updated';
        } else {
            ScreeningQuestion::create([
                'title' => $this->title,
                'pm_id' => Auth::user()->hasAllAccess() ? null : Auth::id(),
                'question_type' => $this->question_type,
                'field_type' => $this->field_type,
                'status' => $this->status,
            ]);
            $msg = 'added';
        }

        $this->resetForm();
        $this->dispatch('tableRefresh');
        $this->dispatch('closeModal');
        $this->dispatch('swal:modal', type: 'success', message: 'Successfully '.$msg.' the screening question');
    }

    private function resetForm()
    {
        $this->title = '';
        $this->pm_id = '';
        $this->question_type = '';
        $this->field_type = '';
        $this->status = '';
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('closeModal');
    }
}
