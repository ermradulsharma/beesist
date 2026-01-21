<?php

namespace Modules\FormBuilder\Events\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Modules\FormBuilder\Entities\Form;

class FormUpdated
{
    use Queueable, SerializesModels;

    public $form;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
