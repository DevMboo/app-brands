<?php

namespace App\Livewire\Pages\Flag\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Group;

class ModalFlagView extends Component
{

    public int $id = 0;

    public int $group_economy_id = 0;

    public string $name = "";

    public bool $render = false;
    
    #[On('show-view-flag')] 
    public function show($id)
    {
        $this->render = !$this->render; 

        $this->name = Flag::find($id)->name;
        $this->group_economy_id = Flag::find($id)->group_economy_id;
    }

    #[On('dismiss-view-flag')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function render()
    {
        return view('livewire.pages.flag.components.modal-flag-view', ['groups' => Group::all()]);
    }
}
