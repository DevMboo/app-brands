<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

use Livewire\Attributes\On;

use App\Models\Group;
use App\Models\Flag;
use App\Models\Unity;
use App\Models\Collaborator;
use App\Models\Timeline;

class HomePage extends Component
{
    use WithPagination, WithoutUrlPagination;

    public int $perPage = 10;

    #[Url]
    public string $search = "";

    public array $totals = ['groups' => 0, 'flags' => 0, 'unitys' => 0, 'collaborators' => 0];

    protected $listeners = ['refresh-list' => '$refresh'];
    
    #[On('search-updated')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function getTotals()
    {
        $this->totals['groups'] = Group::count();
        $this->totals['flags'] = Flag::count();
        $this->totals['unitys'] = Unity::count();
        $this->totals['collaborators'] = Collaborator::count();
    }

    #[On('timeline-broadcast')]
    public function timeline($data)
    {
        Timeline::create($data);
    }

    public function getGroups()
    {
        return Group::where(function($query) {
            if ($this->search) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('id', 'LIKE', '%' . $this->search . '%');
            }
        })->orderBy('id', 'DESC')->paginate($this->perPage);
    }

    public function render()
    {
        $this->getTotals();

        return view('livewire.pages.home.home-page', [
            'groups' => $this->getGroups(),
        ])->title('Home');
    }
}
