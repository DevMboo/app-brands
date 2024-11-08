<?php

namespace App\Livewire\Pages\Unity\Components;

use Livewire\Component;

use Livewire\Attributes\On; 

use App\Models\Flag;
use App\Models\Unity;

class ModalUnityView extends Component
{

    public ?int $flag_id;

    public string $name_fantasy = "";

    public string $company_name = "";

    public string $cnpj = "";

    public bool $render = false;
    
    #[On('show-view-unity')] 
    public function show($id)
    {
        $this->render = !$this->render;

        $unity = Unity::find($id);

        $this->name_fantasy = $unity->name_fantasy;
        $this->company_name = $unity->company_name;
        $this->cnpj = $unity->cnpj;
        $this->flag_id = $unity->flag_id;

    }

    #[On('dismiss-view-unity')] 
    public function dismiss()
    {
        $this->render = false; 
    }

    public function render()
    {
        return view('livewire.pages.unity.components.modal-unity-view', ['flags' => Flag::all()]);
    }
}
