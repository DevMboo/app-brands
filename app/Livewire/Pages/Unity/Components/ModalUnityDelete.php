<?php

namespace App\Livewire\Pages\Unity\Components;

use Livewire\Component;

use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Unity;

class ModalUnityDelete extends Component
{

    public ?int $id;

    public string $name_fantasy = "";

    public string $company_name = "";

    public string $cnpj = "";

    public bool $render = false;

    #[On('show-delete-unity')] 
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

    #[On('dismiss-delete-unity')] 
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
            'run' => 'DELETED', 
            'entity' => 'unity', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'after' => null,
            'before' => $dataChanges
        ];
 
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Unidade deletada com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $unity = Unity::findOrFail($this->id);

        $this->publishTimeline();

        $unity->delete();
        
        $this->unity = null;

    }

    public function render()
    {
        return view('livewire.pages.unity.components.modal-unity-delete');
    }
}
