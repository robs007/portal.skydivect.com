<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventEdit extends Component
{
    public Event $event;

    protected $rules = [
        'event.start_date' => 'required',
        'event.end_date' => 'required',
        'event.start_time' => 'required',
        'event.title' => 'required',
        'event.detail' => 'required',
        'event.cost' => 'nullable|decimal:2',
        'event.max'=> 'nullable|numeric',
        'event.cost_detail' => 'sometimes',
        'event.has_registration' => 'sometimes',
        'event.contact_name'=> 'sometimes',
        'event.contact_email'=> 'sometimes|email',
        'event.contact_phone'=> 'sometimes',
        'event.user_id'=> 'required'

    ];


    public function render()
    {
        return view('livewire.event-edit');
    }

    public function removeRegistration()
    {
        $this->event->cost = 0.00;
        $this->event->cost_detail;
    }

    public function save()
    {
        $this->validate();

        $this->event->save();

        $this->dispatchBrowserEvent('notify', 'Event '.$this->event->title . ' Saved');

    }
}
