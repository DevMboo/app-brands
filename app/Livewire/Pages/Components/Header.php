<?php

namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\Url;

use Illuminate\Support\Str;
class Header extends Component
{
    
    #[Url] 
    public string $search = "";

    public string $name = "";

    public string $email = "";

    public string $initials = "";

    public bool $render = true;

    public array $notRender = ['login', 'reset*'];

    public function getInitials($string) {
        $string = trim($string);
        
        if (empty($string)) {
            return '';
        }
    
        $parts = preg_split('/\s+/', $string);
        
        $initials = [];
    
        foreach ($parts as $part) {
            if (!empty($part)) {
                $initials[] = strtoupper($part[0]);
            }
        }
    
        return implode('', array_slice($initials, 0, 2));
    }

    public function updated($property, $value)
    {
        if($property == 'search') return $this->dispatch('search-updated', search: $value);
    }

    public function mount()
    {
        $currentRouteName = request()->route()->getName();

        if (Str::is($this->notRender, $currentRouteName)) {
            $this->render = false;
        }

        if(auth()->check()) {
            $this->name =auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->initials = $this->getInitials($this->name);
        }

    }

    public function render()
    {
        return view('livewire.pages.components.header');
    }
}
