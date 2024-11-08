<?php

namespace App\Livewire\Pages\Unity\Components;

use Livewire\Component;

use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Unity;

class ModalUnityEdit extends Component
{

    public ?int $flag_id;

    public ?int $id;

    public string $name_fantasy = "";

    public string $company_name = "";

    public string $cnpj = "";

    public bool $render = false;
    
    #[On('show-editabled-unity')] 
    public function show($id)
    {
        $this->render = !$this->render; 

        $unity = Unity::find($id);

        $this->name_fantasy = $unity->name_fantasy;
        $this->company_name = $unity->company_name;
        $this->cnpj = $unity->cnpj;
        $this->flag_id = $unity->flag_id;

        $this->id = $unity->id;
    }

    #[On('dismiss-editabled-unity')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function publishTimeline()
    {
        $dataChanges = \App\Models\Timeline::where('entity', 'unity')
                                            ->where('entity_id', $this->id)
                                            ->latest('created_at')
                                            ->get()
                                            ->value('after');

        $data = [
            'run' => 'EDIT', 
            'entity' => 'unity', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'before' => $dataChanges ?? null,
            'after' => json_encode([
                'name_fantasy' => $this->name_fantasy, 
                'company_name' => $this->company_name, 
                'cnpj' => $this->cnpj, 
                'flag_id' => $this->flag_id
            ])
        ];
        
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();
        $this->dismiss();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Unidade atualizada com sucesso.']);
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
        
        Unity::where('id', $this->id)->update([
                'name_fantasy' => $this->name_fantasy, 
                'company_name' => $this->company_name, 
                'cnpj' => $this->cnpj, 
                'flag_id' => $this->flag_id
            ]);

        $this->publishTimeline();
    }


    public function render()
    {
        return view('livewire.pages.unity.components.modal-unity-edit', ['flags' => Flag::all()]);
    }
}
