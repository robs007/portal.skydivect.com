<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ParticipantAdd extends Component
{
    public Event $event;
    public Participant $participant;

    protected $rules = [
        'participant.firstname' => 'required',
        'participant.lastname' => 'required',
        'participant.phone' => 'sometimes',
        'participant.email' => 'email|required',
        'participant.jumps' => 'sometimes',
        'participant.amount' => 'sometimes',
        ];


    public function render()
    {
        return view('livewire.participant-add');
    }

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->participant = Participant::make([
            'event_id'=> $this->event->id,
            'user_id' => Auth::id()
        ]);
    }

    public function save()
    {
        $this->validate();
        $this->participant->save();

        $this->event->updateCurrentParticipants();

        $this->dispatchBrowserEvent('notify', "New Participant Added to ". $this->event->title);

        return $this->redirect(route('participant-list', $this->event->id));
    }



}
