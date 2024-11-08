<?php

namespace App\Livewire\Pages\Group\Components;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Group;

class ModalGroupDelete extends Component
{
    public ?int $id = null;

    public bool $render = false;
    
    #[On('show-delete-group')] 
    public function show($id)
    {
        $this->render = !$this->render;
        $this->id = $id;
    }

    #[On('dismiss-delete-group')] 
    public function dismiss()
    {
        $this->render = false;
    }

    public function publishTimeline()
    {
        $dataChanges = \App\Models\Timeline::where('entity', 'group_economy')
                                            ->where('entity_id', $this->id)
                                            ->latest('created_at')
                                            ->get()
                                            ->value('after');

        $data = [
            'run' => 'DELETED', 
            'entity' => 'group_economy', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'after' => null,
            'before' => $dataChanges
        ];
 
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Grupo deletado com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->dismiss();

        $group = Group::findOrFail($this->id);
        
        $this->publishTimeline();

        $group->delete();
        
        $this->group = null;

    }

    public function render()
    {
        return view('livewire.pages.group.components.modal-group-delete');
    }
}
