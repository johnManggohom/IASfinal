<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class DashboardTally extends Component
{
    public function render()
    {

           $thisMonth = Transaction::select('transactions.*')->whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))->get()->groupBy(function ($date) {
            return $date->created_at->format('M')?? '';
        })->map(function ($item) {
                return [
              "thisMonth" => $item->sum('appointment_price'),
            ];
             
        });
           $thisWeek = Transaction::select('transactions.*')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->groupBy(function ($date) {
            return $date->created_at->format('W');
   
        })->map(function ($item) {
                return [
              "thisMonth" => $item->sum('appointment_price'),
            ];
             
        });

              $thisDay = Transaction::select('transactions.*')->whereDate('created_at',Carbon::today())->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
   
        })->map(function ($item) {
                return [
              "thisMonth" => $item->sum('appointment_price'),
            ];
             
        });

        $user = User::count();

        $newUsers = User::whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))->count();

    

          $all = Transaction::select('transactions.*')->sum('appointment_price');


        $week = $thisWeek->flatten();
        $month = $thisMonth->flatten();
        $day = $thisDay->flatten();
        

        return view('livewire.dashboard-tally', compact('week', 'month', 'day', 'all', 'user', 'newUsers') );
    }
}
