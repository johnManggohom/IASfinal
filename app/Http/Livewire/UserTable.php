<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
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

        return view('livewire.user-table', [ 'employees'=> $this->pages()->paginate($this->perPage)]);
    }

protected function pages()
{
    return User::select(['id','name', 'email', 'created_at'])->where('isEmployee' , 1)->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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
