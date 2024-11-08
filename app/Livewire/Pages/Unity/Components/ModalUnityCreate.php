<?php

namespace App\Livewire\Pages\Unity\Components;

use Livewire\Component;

use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Unity;

class ModalUnityCreate extends Component
{

    public ?int $id;

    public string $name_fantasy = "";

    public string $company_name = "";

    public string $cnpj = "";

    public ?int $flag_id;

    public bool $render = false;
    
    #[On('show-created-unity')] 
    public function show()
    {
        $this->render = !$this->render;
    }

    #[On('dismiss-created-unity')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $data = ['run' => 'CREATED', 
                 'entity' => 'unity', 
                 'entity_id' => $this->id, 
                 'created_by' => auth()->user()->id, 
                 'updated_by' => auth()->user()->id,
                 'before' => null,
                 'after' => json_encode(['name_fantasy' => $this->name_fantasy,
                                         'company_name' => $this->company_name,
                                         'cnpj' => $this->cnpj,
                                         'flag_id' => $this->flag_id
                                        ]) 
                ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Nova unidade criada com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->validate([
            'name_fantasy' => 'required|min:2|max:255',
            'company_name' => 'required|min:2|max:255',
            'cnpj' => 'required|cnpj',
            'flag_id' => 'required'
        ], [
            'name_fantasy.required' => 'O campo "nome fantasia" é obrigatório.',
            'name_fantasy.min' => 'O campo "nome fantasia" deve conter pelo menos :min caracteres.',
            'name_fantasy.max' => 'O campo "nome fantasia" deve conter no máximo :max caracteres.',

            'company_name.required' => 'O campo "razão social" é obrigatório.',
            'company_name.min' => 'O campo "razão social" deve conter pelo menos :min caracteres.',
            'company_name.max' => 'O campo "razão social" deve conter no máximo :max caracteres.',

            'cnpj.required' => 'O campo "CNPJ" é obrigatório.',
            'cnpj.cnpj' => 'O campo "CNPJ" é inválido.',

            'flag_id.required' => 'O campo "bandeira" é obrigatório.',
        ]);
        
        $unityId = Unity::create([
                'name_fantasy' => $this->name_fantasy, 
                'company_name' => $this->company_name, 
                'cnpj' => $this->cnpj, 
                'flag_id' => $this->flag_id
            ]);

        $this->id = $unityId->id;
        $this->publishTimeline();
    }

    public function render()
    {
        return view('livewire.pages.unity.components.modal-unity-create', ['flags' => Flag::all()]);
    }
}
