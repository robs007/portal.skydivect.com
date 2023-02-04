<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Actions\Jetstream\DeleteUser;

class UserList extends Component
{
    use WithPagination;
    use Actions;


    public function render()
    {
        return view('livewire.user-list',
        ['users' => User::paginate(10)]);
    }

    public function deleteRecord()
    {
        //$this->user->delete();
        (new DeleteUser)->delete(Auth::user);

        $this->dispatchBrowserEvent('notify','User Deleted');
    }
}
