<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class EventAdd extends Component
{
    public Event $event;

    protected $rules = [
        'event.start_date' => 'required',
        'event.end_date' => 'required',
        'event.start_time' => 'required',
        'event.title' => 'required',
        'event.detail' => 'required',
        'event.cost' => 'decimal:2',
        'event.max'=> 'numeric',
        'event.cost_detail' => 'sometimes',
        'event.has_registration' => 'sometimes',
        'event.contact_name'=> 'sometimes',
        'event.contact_email'=> 'sometimes|email',
        'event.contact_phone'=> 'sometimes'

    ];

    public function render()
    {
        return view('livewire.event-add');
    }

    public function mount()
    {
        $this->event = Event::make(['start_date'=> Carbon::now()->format('m/d/Y'),
            'end_date'=> Carbon::now()->format('m/d/Y'),
            'display'=> 1,
            'current'=> 0,
            'user_id'=> \Auth::id()]);
    }

    public function save()
    {
        $this->validate();

        $this->event->save();

        $this->dispatchBrowserEvent('notify', 'Tach / Fuel Saved');

    }
}
