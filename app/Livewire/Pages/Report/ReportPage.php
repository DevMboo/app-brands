<?php

namespace App\Livewire\Pages\Report;

use Livewire\Component;

use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

use App\Models\Collaborator;

use Carbon\Carbon;
class ReportPage extends Component
{

    public function render()
    {
        return view('livewire.pages.report.report-page');
    }
}
