<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;

class DetailContent extends Component
{
    public $transaction;

    public function render()
    {
        return view('livewire.transactions.detail-content');
    }
}
