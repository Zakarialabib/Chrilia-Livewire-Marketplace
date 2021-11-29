<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class Dashboard extends Component
{
    public $status = [
        '0','1','2','3','4','5','6','7','8'];
    
    public $colors = [
        '0' => '#10b981',
        '1' => '#3b82f6',
        '2' => '#6366f1', 
        '3' => '#10b981',
        '4' => '#f97316',
        '5' => '#ef4444',
        '6' => '#047857',
        '7' => '#b91c1c',
        '8' => '#1d4ed8',
    ];

    public $firstRun = true;

    public $showDataLabels = true;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        // dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        // dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        // dd($column);
    }
    public function render()
    {
    
        $this->firstRun = false;

        return view('livewire.admin.dashboard')
        ->with([
            "usersChart" => $this->usersChart(),
            "productsChart" => $this->productsChart(),
        ]);
    }

    public function usersChart()
    {

        //
        $chart = (new LineChartModel())->setTitle(__('Users This Year'))->withoutLegend();

        for ($loop = 0; $loop < 12; $loop++) {
            $date = Carbon::now()->firstOfYear()->addMonths($loop);
            $formattedDate = $date->format("M");
            $data = User::whereMonth("created_at", $date)->count();

            //
            $chart->addPoint(
                $formattedDate,
                $data,
                $this->genColor(),
            );
        }


        return $chart;
    }


    public function productsChart()
    {

        //
        $chart = (new LineChartModel())->setTitle(__('Total Products') . ' (' . Date("Y") . ')')->withoutLegend();

        for ($loop = 0; $loop < 12; $loop++) {
            $date = Carbon::now()->firstOfYear()->addMonths($loop);
            $formattedDate = $date->format("M");
            $data = Product::whereMonth("created_at", $date)->count();

            //
            $chart->addPoint(
                $formattedDate,
                $data,
                $this->genColor(),
            );
        }

        return $chart;
    }

    public function genColor()
    {
        return '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }
}
