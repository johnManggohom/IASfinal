<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\Wage;
use Carbon\Carbon;
use Livewire\Component;

class DataCharts extends Component
{

    public $status;
    public function render()
    {


        if($this->status == 'months'){
            $data = Transaction::select('id', 'created_at', 'appointment_price')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('M');
        })->map(function ($item) {
            return [
            "id" => $item[0]->id,
              "total" => $item->sum('appointment_price'),
            ];
        });
        }elseif($this->status == 'weeks'){
              $data = Transaction::select('id', 'created_at', 'appointment_price')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('W');
        })->map(function ($item) {
            return [
            "id" => $item[0]->id,
              "total" => $item->sum('appointment_price'),
            ];
        });
        }else{
            $now = Carbon::now();
    $data = Transaction::select('id', 'created_at', 'appointment_price')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('D');
        })->map(function ($item) {
            return [
            "id" => $item[0]->id,
              "total" => $item->sum('appointment_price'),
            ];
        });
        }

 $salary =  Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->whereMonth('wages.created_at', date('m'))
->whereYear('wages.created_at', date('Y'))->get()->groupBy(function ($date) {

            return $date->created_at->format('M'). $date->user_id;  
        })->map(function ($item) {
            return [
            "id" => $item[0]->name,
              "total" => $item->sum('commission'),
            ];
        });
        



        $months=[];
        $monthCount=[];


        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[] = $values['total'];

        }

            $commission=[];
        $commissionCount=[];

        foreach($salary as $comm => $values){
              $commission[]=$values['id'];
             $commissionCount[] = $values['total'];

        }
        



        return view('livewire.data-charts', ['data'=> $data, 'months'=>  $months, 'monthCount'=>$monthCount, 'commission' => $commission, 'commissionCount' => $commissionCount]);
    }
}
