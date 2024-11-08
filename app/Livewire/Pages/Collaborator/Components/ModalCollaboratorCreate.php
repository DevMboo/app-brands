<?php

namespace App\Livewire\Pages\Collaborator\Components;

use Livewire\Component;

use Livewire\Attributes\On;

use App\Models\Collaborator;
use App\Models\Unity;

class ModalCollaboratorCreate extends Component
{

    public ?int $id;

    public bool $render = false;

    public string $name = "";

    public string $email = "";

    public string $cpf = "";

    public ?int $unity_id;

    #[On('show-created-collaborator')] 
    public function show()
    {
        $this->render = !$this->render; 
    }

    #[On('dismiss-created-collaborator')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $data = ['run' => 'CREATED', 
                 'entity' => 'collaborators', 
                 'entity_id' => $this->id, 
                 'created_by' => auth()->user()->id, 
                 'updated_by' => auth()->user()->id,
                 'before' => null,
                 'after' => json_encode(['name' => $this->name, 'email' => $this->email, 'cpf' => $this->cpf, 'unity_id' => $this->unity_id]) ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Novo colaborador cadastrado com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:collaborators,email',
            'cpf' => 'required|cpf',
            'unity_id' => 'required'
        ], [
            'name.required' => 'O campo "nome" é obrigatório.',
            'name.min' => 'O campo "nome" deve conter pelo menos :min caracteres.',
            'name.max' => 'O campo "nome" deve conter no máximo :max caracteres.',
        
            'email.required' => 'O campo "e-mail" é obrigatório.',
            'email.email' => 'O campo "e-mail" deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail informado já está em uso.',
        
            'cpf.required' => 'O campo "CPF" é obrigatório.',
            'cpf.cpf' => 'O CPF informado não é válido.',
        
            'unity_id.required' => 'O campo "unidade" é obrigatório.',
        ]);

        $collabId = Collaborator::create([
                'name' => $this->name, 
                'email' => $this->email, 
                'cpf' => $this->cpf, 
                'unity_id' => $this->unity_id
            ]);

        
        $this->id = $collabId->id;
        $this->publishTimeline();

    }

    public function render()
    {
        return view('livewire.pages.collaborator.components.modal-collaborator-create', ['units' => Unity::all()]);
    }
}
