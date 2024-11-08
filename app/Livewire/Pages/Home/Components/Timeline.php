<?php

namespace App\Livewire\Pages\Home\Components;

use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use App\Models\Timeline as ChannelModel;

class Timeline extends Component
{

    public string $search = "";

    public string $run = "";

    public int $limit = 0;

    public ?int $byId = null;

    public Collection $users;

    public function mount()
    {
        $this->users = User::whereNot('id', auth()->user()->id)->where(function($query) {
            if($this->search) {
                $query->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('id', 'LIKE', '%'.$this->search.'%');
            }
        })->get();
    }

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

    public function getTimeline()
    {
        return ChannelModel::with('user')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('run', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('entity', 'LIKE', '%' . $this->search . '%')
                        ->orWhereHas('user', function($q) {
                            $q->where(function($q) {
                                $q->where('name', 'LIKE', '%' . $this->search . '%')
                                  ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                            });
                        });
                });
            })
            ->when($this->byId, function ($query) {
                $query->where('created_by', $this->byId);
            })
            ->when($this->run, function ($query) {
                $query->where('run', $this->run);
            })
            ->when($this->limit > 0, function ($query) {
                $query->limit($this->limit);
            })
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.home.components.timeline', ['timelines' => $this->getTimeline()]);
    }
}
