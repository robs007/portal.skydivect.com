<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;


class EventList extends Component
{
    use WithPagination;
    use Actions;

    public $filter;


    public function render()
    {

        return view('livewire.event-list',
            ['events' => Event::where('start_date','>=', $this->filter)->orderBy('start_date')->paginate(15)]);
    }

    public function mount()
    {
        $this->filter = Carbon::now()->format('Y-m-d');
    }

    public function deleteRecord(Event $event)
    {

        if($event->participants->count() <= 1)
        {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You can not delete this event, there still participants attached'
            );
        }else
        {
            $event->delete();


            $this->dispatchBrowserEvent('notify', 'Event '.$event->title.' has been Deleted');
        }

    }
}
