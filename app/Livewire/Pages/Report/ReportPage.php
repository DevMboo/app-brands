<?php

namespace App\Livewire\Pages\Report;

use Livewire\Component;

use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

use App\Models\Collaborator;
use App\Models\Flag;
use App\Models\Group;
use App\Models\Unity;
use App\Models\Timeline;

use Carbon\Carbon;
class ReportPage extends Component
{

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.pages.report.report-page')->title('Relatórios');
    }
}
