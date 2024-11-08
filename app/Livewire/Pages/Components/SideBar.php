<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

class SideBar extends Component
{

    public bool $render = true;

    public array $notRender = ['login'];

    public function mount()
    {
        $currentRouteName = request()->route()->getName();

        if (in_array($currentRouteName, $this->notRender)) {
            $this->render = false;
        }

    }

    #[On('show-menu')] 
    public function show()
    {
        $this->render = !$this->render;
    }
    

    public function loggout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.pages.components.side-bar');
    }
}
