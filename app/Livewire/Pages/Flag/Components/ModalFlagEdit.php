<?php

namespace App\Livewire\Pages\Flag\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Group;

class ModalFlagEdit extends Component
{

    public int $id = 0;

    public int $group_economy_id;

    public string $name = "";

    public bool $render = false;
    
    #[On('show-editabled-flag')] 
    public function show($id)
    {
        $this->render = !$this->render; 

        $this->id = $id;
        $this->name = Flag::find($id)->name;
        $this->group_economy_id = Flag::find($id)->group_economy_id;
    }

    #[On('dismiss-editabled-flag')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $dataChanges = \App\Models\Timeline::where('entity', 'flags')
                                            ->where('entity_id', $this->id)
                                            ->latest('created_at')
                                            ->get()
                                            ->value('after');

        $data = [
            'run' => 'EDIT', 
            'entity' => 'flags', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'before' => $dataChanges ?? null,
            'after' => json_encode([
                'name' => $this->name, 
                'group_economy_id' => $this->group_economy_id
            ])
        ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Bandeira atualizada com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:255',
            'group_economy_id' => 'required'
        ], [
            'name.required' => 'O campo "nome" é obrigatório.',
            'name.min' => 'O campo "nome" deve conter pelo menos :min caracteres.',
            'name.max' => 'O campo "nome" deve conter no máximo :max caracteres.',

            'group_economy_id.required' => 'O campo "grupo econômico" é obrigatório.'
        ]);
        
        Flag::where('id', $this->id)->update(['name' => $this->name, 'group_economy_id' => $this->group_economy_id]);

        $this->publishTimeline();
    }


    public function render()
    {
        return view('livewire.pages.flag.components.modal-flag-edit', ['groups' => Group::all()]);
    }
}
