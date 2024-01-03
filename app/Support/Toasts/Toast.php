<?php
namespace App\Support\Toasts;

use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Arrayable;

class Toast implements Arrayable {
    public string $id;
    public string $title;
    public ?string $body;

    static public function make(?array $data) {
        $static = app(static::class)::fromArray($data);
        return $static;
    }


    public function send() {
        session()->push(config('app.toasts.session_key', 'site.toasts'), $this->toArray());
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    public static function fromArray(array $data): static
    {
        $static = new static;
        $static->id = $data['id'] ?? Str::orderedUuid();
        $static->title = $data['title'] ?? null;
        $static->body = $data['body'] ?? null;
        return $static;
    }

}
