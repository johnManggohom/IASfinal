<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
 use Barryvdh\DomPDF\Facade\Pdf;

class TransacationTable extends Component
{

            public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
      public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {


        return view('livewire.transacation-table', [ 'transactions'=> $this->pages()->paginate($this->perPage)]);
    }

    protected function pages()
{
    return Transaction::select(['transactions.*' ,'users.name as name'])->join('users', 'transactions.user_id', '=', 'users.id' )->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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

}
