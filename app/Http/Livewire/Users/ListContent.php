<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListContent extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.list-content', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
