<div
    @class([
        'fi-no pointer-events-none fixed inset-4 z-50 mx-auto flex gap-3',
        'items-start',
        'flex-col-reverse justify-end',
    ])
    role="status"
    wire:key="{{ $this->getId() }}-toasts-list"
>
    @foreach ($toasts as $toast)
        <div wire:key="{{ $this->getId() }}-toasts-toast-{{ $toast['id'] }}" class="bg-white p-4 shadow-lg">
            {{ $toast['id'] }}:
            {{ $toast['title'] }}
        </div>
    @endforeach
</div>
