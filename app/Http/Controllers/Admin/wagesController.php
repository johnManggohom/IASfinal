<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class wagesController extends Controller
{
    //

    public function index(){

        $now =  Carbon::now()->startOfWeek(Carbon::MONDAY);
 
$startOfLastWeek = Carbon::now()->subDays(7)->startOfWeek();
$endOfLastWeek = Carbon::now()->subDays(7)->endOfWeek();

 $LastWeek = Carbon::now()->subDays(14)->startOfWeek();
$astWeek = Carbon::now()->subDays(14)->endOfWeek();


$revenues = Wage::select(
    "wages.user_id",

    DB::raw("SUM(CASE WHEN isPay !=1 THEN commission ELSE 0 END) daily_revenue"),    
    DB::raw("SUM(CASE WHEN created_at BETWEEN '".$startOfLastWeek. "' AND '" .$endOfLastWeek."' THEN commission ELSE 0 END) last_week"),
    DB::raw("SUM(CASE WHEN created_at BETWEEN '".$now. "' AND NOW() THEN commission ELSE 0 END) this_week"),
    DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 MONTH THEN commission ELSE 0 END) monthly_revenue"),
    DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 YEAR THEN commission  ELSE 0 END) yearly_revenue"),
)
->groupBy("user_id")

->get(); 

$sales = Wage::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
            'test' => $item[0]->user_id,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        });



return view('admin.wages.index',compact('revenues', 'sales'));
    }

        public function update($wage)
    {       

         $update= Wage::where('user_id' , $wage)->where('isPay', '!=', '1')->update(['isPay' => 1]);



         return to_route('admin.wages.index');
    }


}
