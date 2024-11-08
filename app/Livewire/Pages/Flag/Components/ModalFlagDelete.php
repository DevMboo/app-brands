<?php

namespace App\Livewire\Pages\Flag\Components;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Flag;
use App\Models\Group;

class ModalFlagDelete extends Component
{
    public ?int $id = null;

    public bool $render = false;
    
    #[On('show-delete-flag')] 
    public function show($id)
    {
        $this->render = !$this->render;
        $this->id = $id;
    }

    #[On('dismiss-delete-flag')] 
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
            'run' => 'DELETED', 
            'entity' => 'flags', 
            'entity_id' => $this->id, 
            'created_by' => auth()->user()->id, 
            'updated_by' => auth()->user()->id,
            'after' => null,
            'before' => $dataChanges
        ];
 
        $this->dispatch('timeline-broadcast', data: $data);

        $this->reset();

        $this->dispatch('show-toast', data: ['type' => 1, 'message' => 'Bandeira deletada com sucesso']);
        $this->dispatch('refresh-list');
    }

    public function save()
    {
        $this->dismiss();

        $flag = Flag::findOrFail($this->id);

        $this->publishTimeline();

        $flag->delete();
        
        $this->flag = null;


    }

    public function render()
    {
        return view('livewire.pages.flag.components.modal-flag-delete');
    }
}
