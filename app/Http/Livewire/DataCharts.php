<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class DataCharts extends Component
{

    public $status;
    public function render()
    {

            $data = Transaction::select('id', 'created_at', 'appointment_price')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('D');
        })->map(function ($item) {
            return [
            "id" => $item[0]->id,
              "total" => $item->sum('appointment_price'),
            ];
        });

  

        $months=[];
        $monthCount=[];

        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[] = $values['total'];

        }

        return view('livewire.data-charts', ['data'=> $data, 'months'=>$months, 'monthCount'=>$monthCount]);
    }
}
