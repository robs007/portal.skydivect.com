<?php

namespace App\Http\Livewire;

use App\Exports\ParticipantsExport;
use App\Models\Participant;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Event;

class ParticipantList extends Component
{
    public Event $event;

    public function render()
    {
        return view('livewire.participant-list',
            ['participants' => Participant::where('event_id', $this->event->id)->orderBy('lastname')->paginate(20)]);
    }

    public function deleteRecord(Participant $participant)
    {
        $participant->delete();

        //$this->event->update(['current'=>$this->event->participants()->count()]);
        $this->event->updateCurrentParticipants();

        $this->dispatchBrowserEvent('notify', 'Participant ' . $participant->firstname.' '.$participant->lastname . ' has been Deleted');
    }

    public function export()
    {
        return (new ParticipantsExport($this->event->id))->download('Particapants.xlsx');

    }

    public function send()
    {
        Mail::to(['rszabo@crowleyauto.net'])->send(new \App\Mail\SendEvents());
    }
}
