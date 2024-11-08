<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;

use Livewire\Attributes\On; 

class Forget extends Component
{

    public string $email = "";

    public bool $render = false;

    #[On('show-modal-forget')] 
    public function show()
    {
        $this->render = !$this->render; 
    }

    #[On('dismiss-modal-forget')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function render()
    {
        return view('livewire.pages.components.forget');
    }
}
