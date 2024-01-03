<?php
namespace App\Providers;

use Livewire\Livewire;
use Livewire\Component;
use function Livewire\on;
use function Livewire\store;
use Illuminate\Support\ServiceProvider;

class ToastsServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot(): void
    {
        on('dehydrate', function (Component $component) {
            if (! Livewire::isLivewireRequest()) {
                return;
            }

            if (store($component)->has('redirect')) {
                return;
            }

            if (count(session()->get(config('app.toasts.session_key', 'site.toasts')) ?? []) <= 0) {
                return;
            }

            // ray('toasts-dispatched', $component->getName());
            $component->dispatch('toasts-dispatched');
        });


    }
}
