<?php

namespace App\Http\Livewire\Transactions;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
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
        $search = $this->search;
        return view('livewire.transactions.list-content', [
            'transactions' => Transaction::whereHas('user', function (Builder $user) use ($search) {
                $user->where('name', 'like', '%'.$search.'%' );
            })->whereHas('food', function (Builder $food) use ($search) {
                $food->where('name', 'like', '%'.$search.'%' );
            })->paginate(10)
        ]);
    }
}
