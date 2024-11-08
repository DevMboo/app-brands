<?php

namespace App\Livewire\Pages\Collaborator\Components;

use Livewire\Component;

use App\Models\Collaborator;

class CardCollaborator extends Component
{

    public ?int $collaboratorId = null;

    protected $listeners = ['refresh-list' => '$refresh'];

    public function getCollaboratorProperty()
    {
        return Collaborator::find($this->collaboratorId);
    }

    public function render()
    {
        return view('livewire.pages.collaborator.components.card-collaborator', ['collaborator' => $this->collaborator]);
    }
}
