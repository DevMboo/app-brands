<?php

namespace App\Livewire\Pages\Group\Components;

use Livewire\Component;

use App\Models\Group;

class CardGroup extends Component
{
  
    public ?int $groupId = null;

    protected $listeners = ['refresh-list' => '$refresh'];
    
    public function getGroupProperty()
    {
        return Group::find($this->groupId);
    }

    public function render()
    {
        return view('livewire.pages.group.components.card-group', [
            'group' => $this->group
        ]);
    }
}
