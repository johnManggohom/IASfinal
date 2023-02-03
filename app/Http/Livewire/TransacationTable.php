<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
 use Barryvdh\DomPDF\Facade\Pdf;
 use Livewire\WithPagination;
use Carbon\Carbon;

class TransacationTable extends Component
{

        use WithPagination;
            public $perPage = 5 ;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
    public $to;
      public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $append = 'user_id';


       public function mount(){
        $this->from = '2022-01-01';
       $this->to= Carbon::now();
 }

     public function export() {
    $dataToExport = $this->pages()->paginate($this->perPage);
   
     $data = ['transactions' => $dataToExport];
      $pdf = PDF::loadView('admin.transaction.transacationpdf', $data)->setPaper('a4', 'portrait')->output(); //
return response()->streamDownload(
    fn() => print($pdf), 'export_protocol.pdf'
);
}
  
    public function render()
    {


        return view('livewire.transacation-table', [ 'transactions'=> $this->pages()->paginate($this->perPage)]);
    }

    protected function pages()
{

    if($this->status == 'thisMonth'){
     return Transaction::select(['transactions.*', 'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id')->whereMonth('transactions.created_at', date('m'))
->whereYear('transactions.created_at', date('Y'))->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
    }elseif($this->status == 'thisWeek'){
         return Transaction::select(['transactions.*', 'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id')->whereBetween('transactions.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
    }elseif($this->status == 'thisWeek'){


                return Transaction::select(['transactions.*', 'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id')->when($this->from, function($query) {
            $query->where('created_at','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('created_at','<=', $this->to);
        })->whereBetween('appointments.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 
        
        

        }elseif($this->status =='thisDay'){


            
                return Transaction::select(['transactions.*', 'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id')->when($this->from, function($query) {
            $query->where('transactions.created_at','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('transactions.created_at','<=', $this->to);
        })->whereDate('transactions.created_at', Carbon::today())->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 

        }else{
 return Transaction::select(['transactions.*', 'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id')->whereDate('transactions.created_at', '>=', $this->from)
    ->whereDate('transactions.created_at', '<=', $this->to)->orderBy($this->sortColumnName, $this->sortDirection)->searchNo(trim($this->search));
    }
 
    }   


    public function sortBy($columnName){


if($this->sortColumnName ===  $columnName){
    


         $this->sortDirection = $this->swapSortDirection();
    
            
 
}else{
    $this->sortDirection = 'asc';
}

$this->sortColumnName = $columnName;


}

public function swapSortDirection(){
    return $this->sortDirection === 'asc' ? 'desc' : 'asc';
}



    public function printInvoice(){}

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
     $this->sortColumnName = 'start_time';
    $this->sortDirection = 'asc';
      $this->status = '';

}


}
