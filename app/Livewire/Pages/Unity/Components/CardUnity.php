<?php

namespace App\Livewire\Pages\Unity\Components;

use Livewire\Component;

use App\Models\Unity;
class CardUnity extends Component
{
    public ?int $unityId = null;

    protected $listeners = ['refresh-list' => '$refresh'];

    public function getUnityProperty()
    {
        return Unity::find($this->unityId);
    }

    public function render()
    {
        return view('livewire.pages.unity.components.card-unity', ['unity' => $this->unity]);
    }
}
