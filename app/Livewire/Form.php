<?php

namespace App\Livewire;

use Livewire\Component;
use App\Support\Toasts\Toast;

class Form extends Component
{

    public function submit() {
        Toast::make([
            'title' => 'Processing form',
        ])->send();
        // $this->dispatch('toasts-dispatched');
    }

    public function render()
    {
        return view('livewire.form');
    }
}
