<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Carbon\Carbon;
use Livewire\Component;

class ParticipantEdit extends Component
{
    public Participant $participant;
    public $current_event_id;

    protected $rules = [
        'participant.firstname' => 'required',
        'participant.lastname' => 'required',
        'participant.phone' => 'sometimes',
        'participant.email' => 'email|required',
        'participant.user_id' => 'sometimes',
        'participant.jumps' => 'sometimes',
        'participant.amount' => 'sometimes',
        'participant.event_id' => 'required'
        ];

    public function render()
    {
        return view('livewire.participant-edit',
        ['events'=> Event::where('start_date','>=', Carbon::now()->subDays(20)->format('Y-m-d'))->get()]);
    }

    public function mount()
    {
        $this->current_event_id = $this->participant->event_id;
    }

    public function save()
    {
        $this->validate();

        $this->participant->save();

        Event::find($this->current_event_id)->updateCurrentParticipants();
        $this->participant->event->updateCurrentParticipants();

        $this->dispatchBrowserEvent('notify', 'Updated'.$this->participant->firstname.' '.$this->participant->lastname. '');

    }
}
