<?php

namespace App\Livewire\Pages\Collaborator\Components;

use Livewire\Component;

use Livewire\Attributes\On;

use App\Models\Collaborator;
use App\Models\Unity;

class ModalCollaboratorDelete extends Component
{

    public ?int $id = null;

    public bool $render = false;
    
    #[On('show-delete-collaborator')] 
    public function show($id)
    {
        $this->render = !$this->render;
        $this->id = $id;
    }

    #[On('dismiss-delete-collaborator')] 
    public function dismiss()
    {
        $this->render = false;
    }

    public function publishTimeline()
    {
        $dataChanges = \App\Models\Timeline::where('entity', 'collaborators')
                                            ->where('entity_id', $this->id)
                                            ->latest('created_at')
                                            ->get()
                                            ->value('after');

        $data = [
            'run' => 'DELETED', 
            'entity' => 'collaborators', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'after' => null,
            'before' => $dataChanges
        ];
 
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Colaborador deletado com sucesso.']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {

        $collaborator = Collaborator::findOrFail($this->id);

        $this->publishTimeline();

        $collaborator->delete();
        
        $this->collaborator = null;

    }

    public function render()
    {
        return view('livewire.pages.collaborator.components.modal-collaborator-delete');
    }
}
