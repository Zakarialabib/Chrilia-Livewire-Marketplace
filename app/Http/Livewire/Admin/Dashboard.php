<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
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
        $orders = Order::whereIn('status', $this->status)->get();
        // dd($orders);
        $pieChartModel = $orders->groupBy('status')
        ->reduce(function (PieChartModel $pieChartModel, $data) {
        $type = $data->first()->status;
        $value = $data->sum('total');
        return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
        }, (new PieChartModel())
        ->setTitle(__('Total Orders by Status'))
        ->setAnimated($this->firstRun)
        ->withOnSliceClickEvent('onSliceClick')
        ->setLegendVisibility(false)
        ->setDataLabelsEnabled($this->showDataLabels)
        );
       
        $this->firstRun = false;

        return view('livewire.admin.dashboard')
        ->with([
            'pieChartModel' => $pieChartModel,
            "earningChart" => $this->earningChart(),
            "usersChart" => $this->usersChart(),
            "ordersChart" => $this->ordersChart(),
        ]);
    }

    public function earningChart()
    {

        //
        $chart = (new LineChartModel())->setTitle(__('Total Earning') . ' (' . Date("Y") . ')')->withoutLegend();

        for ($loop = 0; $loop < 12; $loop++) {
            $date = Carbon::now()->firstOfYear()->addMonths($loop);
            $formattedDate = $date->format("M");
            $data = Order::whereMonth("created_at", $date)->sum('total');

            //
            $chart->addPoint(
                $formattedDate,
                $data,
                $this->genColor(),
            );
        }


        return $chart;
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


    public function ordersChart()
    {

        //
        $chart = (new LineChartModel())->setTitle(__('Total Orders') . ' (' . Date("Y") . ')')->withoutLegend();

        for ($loop = 0; $loop < 12; $loop++) {
            $date = Carbon::now()->firstOfYear()->addMonths($loop);
            $formattedDate = $date->format("M");
            $data = Order::whereMonth("created_at", $date)->count();

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
