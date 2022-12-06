<?php

namespace App\Http\Livewire;

use App\Models\Wage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WageTable extends Component
{

    public $status;
    public function render()
    {

        
        $now =  Carbon::now()->startOfWeek(Carbon::MONDAY);
 
$startOfLastWeek = Carbon::now()->subDays(7)->startOfWeek();
$endOfLastWeek = Carbon::now()->subDays(7)->endOfWeek();

 $LastWeek = Carbon::now()->subDays(14)->startOfWeek();
$astWeek = Carbon::now()->subDays(14)->endOfWeek();


$revenues = Wage::select(
    "wages.user_id",

    DB::raw("SUM(CASE WHEN Date(created_at) = CURDATE()  THEN commission ELSE 0 END) daily_revenue"),    
    DB::raw("SUM(CASE WHEN created_at BETWEEN '".$startOfLastWeek. "' AND '" .$endOfLastWeek."' THEN commission ELSE 0 END) last_week"),
    DB::raw("SUM(CASE WHEN created_at BETWEEN '".$now. "' AND NOW() THEN commission ELSE 0 END) this_week"),
    DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 MONTH THEN commission ELSE 0 END) monthly_revenue"),
    DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 YEAR THEN commission  ELSE 0 END) yearly_revenue"),
)
->groupBy("user_id")

->get(); 

 if($this->status == 'weeks'){

        $sales = Wage::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
           return Carbon::parse($date->created_at)->format('W') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        });

    }elseif($this->status == 'months'){
           
        $sales = Wage::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
           return Carbon::parse($date->created_at)->format('M') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        });
    }else{
        $sales = Wage::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        });

    }


        return view('livewire.wage-table',[
            'sales' => $sales
        ]);
    }
}
