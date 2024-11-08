<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

class Toast extends Component
{
    public int $type = 0;

    public string $message = "";

    public bool $render = false;

    #[On('show-toast')] 
    public function show($data)
    {
        $this->type = $data['type'] ?? 1;
        $this->message = $data['message'] ?? "Ação realizada com sucesso!";
    }

    #[On('close-toast')] 
    public function close()
    {
        $this->type = 0;
    }

    public function render()
    {
        return view('livewire.pages.components.toast');
    }
}
