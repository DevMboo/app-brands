<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class CardProgress extends Component
{
    public string $title = "";

    public string $ico = "";

    #[Reactive] 
    public int $total = 0;

    public function render()
    {
        return view('livewire.pages.components.card-progress');
    }
}
