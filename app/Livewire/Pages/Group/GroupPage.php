<?php

namespace App\Livewire\Pages\Group;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

use App\Models\Group;
use App\Models\Timeline;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

use Carbon\Carbon;

class GroupPage extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Url]
    public string $search = "";

    public int $perPage = 10;

    public string $date_ini = "";

    public string $date_end = "";

    public ?Collection $collection;

    protected $listeners = ['refresh-list' => '$refresh'];

    #[On('search-updated')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    private function validateDate($date)
    {
        if ($date && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            return Carbon::createFromFormat('d/m/Y', $date)->startOfDay();
        }
        
        return null;
    }

    #[On('timeline-broadcast')]
    public function timeline($data)
    {
        Timeline::create($data);
    }

    public function getGroups()
    {
        $dateIni = $this->validateDate($this->date_ini);
        $dateEnd = $this->validateDate($this->date_end);

        return Group::when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('id', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->when($dateIni && !$dateEnd, function ($query) use ($dateIni) {
                $query->where('created_at', '>=', $dateIni);
            })
            ->when(!$dateIni && $dateEnd, function ($query) use ($dateEnd) {
                $query->where('created_at', '<=', $dateEnd);
            })
            ->when($dateIni && $dateEnd, function ($query) use ($dateIni, $dateEnd) {
                $query->whereBetween('created_at', [$dateIni, $dateEnd]);
            })
            ->orderBy('id', 'DESC')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.pages.group.group-page', [
            'groups' => $this->getGroups(),
        ])->title('Grupo econômico');
    }
}
