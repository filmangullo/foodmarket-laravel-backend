<?php

namespace App\Http\Livewire\Food;

use App\Models\Food;
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
        return view('livewire.food.list-content', [
            'food' => Food::where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
