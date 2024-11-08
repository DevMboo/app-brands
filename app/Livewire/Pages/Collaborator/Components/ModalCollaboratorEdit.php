<?php

namespace App\Livewire\Pages\Collaborator\Components;

use Livewire\Component;

use Livewire\Attributes\On;

use App\Models\Collaborator;
use App\Models\Unity;

class ModalCollaboratorEdit extends Component
{

    public bool $render = false;

    public string $name = "";

    public string $email = "";

    public string $cpf = "";

    public ?int $unity_id;

    public ?int $id;

    #[On('show-editabled-collaborator')] 
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

    #[On('dismiss-editabled-collaborator')] 
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
            'run' => 'EDIT', 
            'entity' => 'collaborators', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'before' => $dataChanges ?? null,
            'after' => json_encode([
                'name' => $this->name, 
                'email' => $this->email, 
                'cpf' => $this->cpf, 
                'unity_id' => $this->unity_id
            ])
        ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Colaborador atualizado com sucesso']);
        $this->dispatch('refresh-list');
    }



    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:255',
            'cpf' => 'required|cpf',
            'unity_id' => 'required'
        ], [
            'name.required' => 'O campo "nome" é obrigatório.',
            'name.min' => 'O campo "nome" deve conter pelo menos :min caracteres.',
            'name.max' => 'O campo "nome" deve conter no máximo :max caracteres.',
        
            'cpf.required' => 'O campo "CPF" é obrigatório.',
            'cpf.cpf' => 'O CPF informado não é válido.',
        
            'unity_id.required' => 'O campo "unidade" é obrigatório.',
        ]);

        Collaborator::where('id', $this->id)->update([
                'name' => $this->name,
                'cpf' => $this->cpf, 
                'unity_id' => $this->unity_id
            ]);

        $this->publishTimeline();
    }

    public function render()
    {
        return view('livewire.pages.collaborator.components.modal-collaborator-edit', ['units' => Unity::all()]);
    }
}
