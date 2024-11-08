<?php

namespace App\Livewire\Pages\Group\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Group;

class ModalGroupCreate extends Component
{

    public ?int $id;

    public string $name = "";

    public bool $render = false;
    
    #[On('show-created-group')] 
    public function show()
    {
        $this->render = !$this->render;
    }

    #[On('dismiss-created-group')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $data = ['run' => 'CREATED', 
                 'entity' => 'group_economy', 
                 'entity_id' => $this->id, 
                 'created_by' => auth()->user()->id, 
                 'updated_by' => auth()->user()->id,
                 'before' => null,
                 'after' => json_encode(['name' => $this->name]) ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Novo grupo cadastrado com sucesso']);
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
        
        $groudId = Group::create(['name' => $this->name]);

        $this->id = $groudId->id;

        $this->publishTimeline();
    }

    public function render()
    {
        return view('livewire.pages.group.components.modal-group-create');
    }
}
