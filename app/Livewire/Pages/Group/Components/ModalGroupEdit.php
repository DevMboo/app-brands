<?php

namespace App\Livewire\Pages\Group\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Group;
class ModalGroupEdit extends Component
{

    public int $id = 0;

    public string $name = "";

    public bool $render = false;
    
    #[On('show-editabled-group')] 
    public function show($id)
    {
        $this->render = !$this->render;

        $this->id = $id;
        $this->name = Group::find($id)->name;
    }

    #[On('dismiss-editabled-group')] 
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
            'run' => 'EDIT', 
            'entity' => 'group_economy', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'before' => $dataChanges ?? null,
            'after' => json_encode([
                'name' => $this->name
            ])
        ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Grupo atualizado com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:255'
        ], [
            'name.required' => 'O campo "nome" é obrigatório.',
            'name.min' => 'O campo "nome" deve conter pelo menos :min caracteres.',
            'name.max' => 'O campo "nome" deve conter no máximo :max caracteres.'
        ]);
        
        Group::where('id', $this->id)->update(['name' => $this->name]);

        $this->publishTimeline();
    }


    public function render()
    {
        return view('livewire.pages.group.components.modal-group-edit');
    }
}
