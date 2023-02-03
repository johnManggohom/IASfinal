<?php

namespace App\Http\Livewire;

use App\Models\Wage;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WageTable extends Component
{
       use WithPagination;



            public $perPage = 1;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
       public $to;
      public $sortColumnName = 'id';
        public $sortDirection = false;

    protected $append = 'user_id';
    public function render()
    {

        




        return view('livewire.wage-table',[
            'sales' => $this->pages()
        ]);
    }



    protected function pages()
{
   if($this->status == 'weeks'){

        $salary = Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->get()->groupBy(function ($date) {
           return Carbon::parse($date->created_at)->format('W') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);

    }elseif($this->status == 'months'){
           
         $salary =  Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->get()->groupBy(function ($date) {
            return $date->created_at->format('M'). $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);
    }elseif($this->status == 'thisMonth'){
           
         $salary =  Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->whereMonth('wages.created_at', date('m'))
->whereYear('wages.created_at', date('Y'))->get()->groupBy(function ($date) {

            return $date->created_at->format('M'). $date->user_id;  
        })->map(function ($item) {
            return [
            "id" => $item[0]->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);


    }elseif($this->status == 'thisWeek'){
           
         $salary =  Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->whereBetween('wages.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->groupBy(function ($date) {
            return $date->created_at->format('W'). $date->user_id;  
        })->map(function ($item) {
            return [
            "id" => $item[0]->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);


    }elseif($this->status == 'thisDay'){
           
         $salary =  Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->whereDate('wages.created_at', Carbon::today())->get()->groupBy(function ($date) {
            return $date->created_at->format('W'). $date->user_id;  
        })->map(function ($item) {
            return [
            "id" => $item[0]->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);


    }else{
        $salary = Wage::select(['wages.*' ,'users.name as name'])->join('users', 'wages.user_id', '=', 'users.id' )->where('wages.isPay', 1)->get()->groupBy(function ($date) {
            return $date->created_at->format('Y-m-d') . $date->user_id;
        })->map(function ($item) {
            return [
            "id" => $item[0]->user->name,
              "date" => $item[0]->created_at,
              "total" => $item->sum('commission'),
            ];
        })->sortBy(function($value, $key) {
    return $value[$this->sortColumnName];
}, SORT_REGULAR, $this->sortDirection);


    }

    return $this->paginate($salary);


 
      
}   

     public function sortBy($columnName){


if($this->sortColumnName ===  $columnName){
    


         $this->sortDirection = $this->swapSortDirection();
    
            
 
}else{
    $this->sortDirection = 'asc';
}

$this->sortColumnName = $columnName;


}




  public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (PaginationPaginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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

}
