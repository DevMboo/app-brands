<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

use Illuminate\Support\Str;
class SideBar extends Component
{

    public bool $render = true;

    public array $notRender = ['login','reset*'];

    public function mount()
    {
        $currentRouteName = request()->route()->getName();

        if (Str::is($this->notRender, $currentRouteName)) {
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
