<?php

namespace App\Livewire\Pages\Group\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Group;

class ModalGroupView extends Component
{

    public int $id = 0;

    public string $name = "";

    public bool $render = false;
    
    #[On('show-view-group')] 
    public function show($id)
    {
        $this->render = !$this->render; 

        $this->name = Group::find($id)->name;
    }

    #[On('dismiss-view-group')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function render()
    {
        return view('livewire.pages.group.components.modal-group-view');
    }
}
