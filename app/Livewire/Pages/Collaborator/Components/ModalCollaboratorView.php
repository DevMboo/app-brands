<?php

namespace App\Livewire\Pages\Collaborator\Components;

use Livewire\Component;

use Livewire\Attributes\On;

use App\Models\Collaborator;
use App\Models\Unity;

class ModalCollaboratorView extends Component
{

    public bool $render = false;

    public string $name = "";

    public string $email = "";

    public string $cpf = "";

    public ?int $unity_id;

    public ?int $id;

    #[On('show-view-collaborator')] 
    public function show($id)
    {
        $this->render = !$this->render; 

        $collaborator = Collaborator::find($id);

        $this->name = $collaborator->name;
        $this->email = $collaborator->email;
        $this->cpf = $collaborator->cpf;
        $this->unity_id = $collaborator->unity_id;

        $this->id = $collaborator->id;
    }

    #[On('dismiss-view-collaborator')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function render()
    {
        return view('livewire.pages.collaborator.components.modal-collaborator-view', ['units' => Unity::all()]);
    }
}
