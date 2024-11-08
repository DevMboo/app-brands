<?php

namespace App\Livewire\Pages\Flag\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Group;

class ModalFlagCreate extends Component
{

    public ?int $id;

    public string $name = "";

    public int $group_economy_id;

    public bool $render = false;

    #[On('show-created-flag')] 
    public function show()
    {
        $this->render = !$this->render; 
    }

    #[On('dismiss-created-flag')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $data = ['run' => 'CREATED', 
                 'entity' => 'flags', 
                 'entity_id' => $this->id, 
                 'created_by' => auth()->user()->id, 
                 'updated_by' => auth()->user()->id,
                 'before' => null,
                 'after' => json_encode(['name' => $this->name, 'group_economy_id' => $this->group_economy_id]) ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Nova bandeira cadastrada com sucesso']);
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
        
        $flagId = Flag::create(['name' => $this->name, 'group_economy_id' => $this->group_economy_id]);

        $this->id = $flagId->id;

        $this->publishTimeline();
    }

    public function render()
    {
        return view('livewire.pages.flag.components.modal-flag-create', ['groups' => Group::all()]);
    }
}
