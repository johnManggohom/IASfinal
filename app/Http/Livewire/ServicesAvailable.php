<?php

namespace App\Http\Livewire;

use App\Models\Services;
use Livewire\Component;

class ServicesAvailable extends Component
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


        return view('livewire.services-available', ['services'=>$this->pages()->paginate($this->perPage)]);
    }


    protected function pages()
{
    return Services::select(['services.*'])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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
}
