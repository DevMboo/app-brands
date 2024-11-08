<?php

namespace App\Livewire\Pages\Report\Components;

use Livewire\Component;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;

use App\Models\User;
use App\Models\Timeline;
use Carbon\Carbon;
class ColumnChartChanges extends Component
{

    public ?int $days = 7;

    private function randomColor()
    {
        $colors = ['#4CAF50', '#FF9800', '#03A9F4', '#E91E63', '#9C27B0', '#FFC107', '#FF5722'];
        return $colors[array_rand($colors)];
    }

    public function render()
    {

        $startDate = Carbon::now()->subDays($this->days);

        $userChanges = Timeline::with('user') // Isso deve carregar a relação 'user'
            ->where('created_at', '>=', $startDate)
            ->select(
                'created_by',
                \DB::raw('count(*) as changes_count')
            )
            ->groupBy('created_by')
            ->get();

        $columnChartModel = new ColumnChartModel();

        foreach ($userChanges as $change) {
            $userName = $change->user ? $change->user->name : 'Desconhecido';

            $columnChartModel->addColumn($userName, $change->changes_count, $this->randomColor());
        }

        return view('livewire.pages.report.components.column-chart-changes', [
            'columnChartModel' => $columnChartModel,
        ]);

    }
}
