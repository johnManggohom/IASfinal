<?php

namespace App\Http\Livewire;


use App\Models\Expenses;
use App\Models\Transaction;
use App\Models\Wage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SalesTable extends Component
{
    use WithPagination;

    public $perage =5 ;
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

 
    public function export() {
    $dataToExport = $this->pages();


   
   $dataToExport = Arr::except($dataToExport,[0]);

       $pdf = PDF::loadView('admin.transaction.salespdf', $dataToExport)->setPaper('a4', 'portrait')->output(); //
return response()->streamDownload(
    fn() => print($pdf), 'export_protocol.pdf'
);
}
    public function render()

    
    {

        return view('livewire.sales-table', $this->pages());
    
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
    

public function month($day){

    if($day == 'month'){
                $this->status = 'thisMonth';
    }elseif($day == 'week'){
         $this->status = 'thisWeek';   
    }elseif($day == 'day'){
        $this->status = 'thisDay';
    }

}

public function remove(){
     $this->from = '2022-01-01';
       $this->to= Carbon::now();
     $this->sortColumnName = 'date';
    $this->sortDirection = false;
      $this->status = '';

}

public function pages(){


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





 
        $expense = Expenses::select('expenses.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('W');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);
        

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





 
        $expense = Expenses::select('expenses.*') ->whereDate('created_at', '>=', $this->from)
    ->whereDate('created_at', '<=', $this->to)->get()->groupBy(function ($date) {
            return $date->created_at->format('M');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);
        
    }elseif($this->status == 'thisMonth'){
           
         $transactions = Transaction::select('transactions.*')->whereMonth('end_time', date('m'))
->whereYear('end_time', date('Y'))->get()->groupBy(function ($date) {
            return $date->end_time->format('M');
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







 
        $expense = Expenses::select('expenses.*')->whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))->get()->groupBy(function ($date) {
            return $date->created_at->format('M');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);

        
    }elseif($this->status == 'thisWeek'){
           
         $transactions = Transaction::select('transactions.*')->whereBetween('end_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->groupBy(function ($date) {
            return $date->end_time->format('W');
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







 
        $expense = Expenses::select('expenses.*')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->groupBy(function ($date) {
            return $date->created_at->format('W');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);
        
    }elseif($this->status == 'thisDay'){
           
         $transactions = Transaction::select('transactions.*')->whereDate('created_at', Carbon::today())->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d');
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







 
        $expense = Expenses::select('expenses.*')->whereDate('created_at', Carbon::today())->get()->groupBy(function ($date) {
            return $date->created_at->format('W');
        })->map(function ($item) {
           
                return [
                    "date" => $item[0]->created_at,
              "expense" => $item->sum('amount'),
            ];
             
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);
        
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

$transactions->map(function ($transaction) use ($expense) {
    $score = $expense->first(function ($value, $key) use ($transaction) {
        return $key === $transaction['date'];
    });

    if ($score !== null) {
        $transaction->count = $score;
    }

    

    return $transaction;
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

    $gaga = $this->paginate($transactions);
    $totalUsers = $transactions->sum(function ($analyticsData4) {
  return $analyticsData4['total'];
});
    $totalExpense = $expense->sum(function ($analyticsData4) {
  return $analyticsData4['expense'];
});

    $totalWage = $transactions->sum(function ($analyticsData4) {
  return $analyticsData4['wage'];
});
    


return (['transactions' => $gaga,'total'=>$totalUsers,'expense'=>$expense,'totalExpense'=>$totalExpense,'totalWage' => $totalWage]);
}



    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (PaginationPaginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



}

            
            
            
            