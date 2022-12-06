<?php

namespace App\Http\Livewire;


use App\Models\Expenses;
use App\Models\Transaction;
use App\Models\Wage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesTable extends Component
{

    public $perPage;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
    public $to ;
      public $sortColumnName = 'date';
    public $sortDirection = false;

    protected $append = 'user_id';


    public function mount(){
        $this->from = '2022-01-01';
       $this->to= Carbon::now();
 }
    public function render()

    
    {




 if($this->status == 'weeks'){

        $transactions = Transaction::select('transactions.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('W');
        })->map(function ($item, $key) {
            
          
            $gaga = 0;
            foreach($item as $t){
                        $gaga = $gaga + $t->wage->commission;
            }
                return [
               "date" => $item[0]->end_time->format('F d, Y'),
               "wage"=> $gaga,
               "expense"=> Null,
              "total" => $item->sum('appointment_price'),
            ];

             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);





 
        $expense = Expenses::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        });
        

    }elseif($this->status == 'months'){
           
         $transactions = Transaction::select('transactions.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('M');
        })->map(function ($item, $key) {
            
          
            $gaga = 0;
            foreach($item as $t){
                        $gaga = $gaga + $t->wage->commission;
            }
                return [
               "date" => Carbon::parse($key)->format('F d, Y'),
               "wage"=> $gaga,
               "expense"=> Null,
              "total" => $item->sum('appointment_price'),
            ];

             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);





 
        $expense = Expenses::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        });
        
    }elseif($this->status == 'thisMonth'){
           
         $transactions = Transaction::select('transactions.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('M');
        })->map(function ($item, $key) {
            
          
            $gaga = 0;
            foreach($item as $t){
                        $gaga = $gaga + $t->wage->commission;
            }
                return [
               "date" => Carbon::parse($key)->format('F d, Y'),
               "wage"=> $gaga,
               "expense"=> Null,
              "total" => $item->sum('appointment_price'),
            ];

             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);





 
        $expense = Expenses::all()->sortBy('created_at', SORT_REGULAR, true)->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        });
        
    }else{
        
        $transactions = Transaction::select('transactions.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        })->map(function ($item, $key) {
            
          
            $gaga = 0;
            foreach($item as $t){
                        $gaga = $gaga + $t->wage->commission;
            }
                return [
               "date" => Carbon::parse($key)->format('F d, Y'),
               "wage"=> $gaga,
               "expense"=> Null,
              "total" => $item->sum('appointment_price'),
            ];

             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);

 
        $expense = Expenses::select('expenses.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        });
        


// $gaga =$transactions->map(function ($transaction) use ($expense) {
//     $exp = $expense->first(function ($value, $key) use ($transaction) {

//         return $key === $transaction['date']->format('Y-m-d');
//     });

//     dd($exp['expense']);

//     if ($exp !== null && $transaction['expense']) {
//         $transaction['expense'] = $exp['expense'];
//     }

  

//     return $transaction;
// });

// dd($gaga);


    }
    $totalUsers = $transactions->sum(function ($analyticsData4) {
  return $analyticsData4['total'] + ( $analyticsData4['total'] *.12);
});
    $totalExpense = $expense->sum(function ($analyticsData4) {
  return $analyticsData4['expense'];
});


        return view('livewire.sales-table',[
            'transactions' => $transactions,
            'total'=>$totalUsers,
            'expense'=>$expense,
            'totalExpense'=>$totalExpense
            //  'expense' => $expense
        ]);
    
    }


    public function sorting($columnName){

        if($this->sortColumnName ===  $columnName){
    


         $this->sortDirection = $this->swapSortDirection();
    
            
 
}else{
    $this->sortDirection = true;
}

$this->sortColumnName = $columnName;

    }

    public function swapSortDirection(){
    return $this->sortDirection === true ? false : true;
}
    

public function month(){
    $this->status = 'thisMonth';
}
}

  