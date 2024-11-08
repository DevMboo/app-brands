<?php

namespace App\Livewire\Pages\Report\Components;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use App\Models\Timeline;
use Carbon\Carbon;

class PieChartEntitys extends Component
{
    public ?int $days = 7;

    public function render()
    {
        $startDate = Carbon::now()->subDays($this->days);

        $createdCount = Timeline::where('run', 'CREATED')
            ->where('created_at', '>=', $startDate)
            ->count();
        
        $editCount = Timeline::where('run', 'EDIT')
            ->where('created_at', '>=', $startDate)
            ->count();
        
        $deleteCount = Timeline::where('run', 'DELETED')
            ->where('created_at', '>=', $startDate)
            ->count();

        $pieChartModel = new PieChartModel();

        $pieChartModel->addSlice('Novos registros', $createdCount, '#0000FF')
            ->addSlice('Editações realizadas', $editCount, '#FFFF00')
            ->addSlice('Deletados', $deleteCount, '#FF0000');

        return view('livewire.pages.report.components.pie-chart-entitys', [
            'pieChartModel' => $pieChartModel
        ]);
    }
}
