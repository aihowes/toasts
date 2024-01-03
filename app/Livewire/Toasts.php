<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Toasts extends Component
{
    public $toasts;

    public function mount() {
        $this->toasts = collect();
        $this->pullToastsFromSession();
    }

    #[On('toasts-dispatched')]
    public function handleToastsDispatched() {
        ray('toasts-dispatched recieved');
        $this->pullToastsFromSession();
    }

    public function pullToastsFromSession() {
        $toasts = session()->pull(config('app.toasts.session_key', 'site.toasts')) ?? [];
        foreach ($toasts as $toast) {
            $this->pushToast($toast);
        }
    }

    public function pushToast($toast) {
        $this->toasts->put(
            $toast['id'],
            $toast,
        );
    }

    public function render()
    {
        return view('livewire.toasts');
    }
}
