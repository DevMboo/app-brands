<?php

namespace App\Livewire\Pages\Flag\Components;

use Livewire\Component;

use App\Models\Flag;

class CardFlag extends Component
{

    public ?int $flagId = null;

    protected $listeners = ['refresh-list' => '$refresh'];

    public function getFlagProperty()
    {
        return Flag::find($this->flagId);
    }
    
    public function render()
    {
        return view('livewire.pages.flag.components.card-flag',[
            'flag' => $this->flag
        ]);
    }
}
