<?php

namespace App\Livewire\Pages\Report\Components;

use Livewire\Component;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;

use App\Models\Group;
use Carbon\Carbon;

class ColumnChartGroups extends Component
{

    public ?int $days = 7;

    private function randomColor()
    {
        $colors = ['#4CAF50', '#FF9800', '#03A9F4', '#E91E63', '#9C27B0', '#FFC107', '#FF5722'];
        return $colors[array_rand($colors)];
    }

    public function render()
    {
        $groupsData = Group::where('created_at', '>=', Carbon::now()->subDays($this->days))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $columnChartModel = new ColumnChartModel();

        foreach ($groupsData as $group) {
            $columnChartModel->addColumn(
                //Carbon::parse($group->date)->format('d M'), 
                'Dia '.Carbon::parse($group->date)->format('d'),
                $group->count,
                $this->randomColor()
            );
        }

        return view('livewire.pages.report.components.column-chart-groups', [
            'columnChartModel' => $columnChartModel->setTitle('Últimos 7 dias'),
        ]);
    }
}
