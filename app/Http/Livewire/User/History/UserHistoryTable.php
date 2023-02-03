<?php

namespace App\Http\Livewire\User\History;

use App\Models\Appointment;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserHistoryTable extends Component
{
        use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
      public $to;
      public $sortColumnName = 'start_time';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    


    public function export() {
    $dataToExport = $this->pages()->paginate($this->perPage);
   
     $data = ['appointments' => $dataToExport];
      $pdf = PDF::loadView('admin.appointment.appointmentpdf', $data)->setPaper('a4', 'portrait')->output(); //
return response()->streamDownload(
    fn() => print($pdf), 'export_protocol.pdf'
);
}


    public function render()

{

        return view('livewire.user.history.user-history-table', [
            'appointments'=> $this->pages()->paginate($this->perPage)
        ]);
    }

    

    protected function pages()
{

    $user = Auth::user();
    $user_id  = $user->id;

        return Appointment::select(['appointment.*', 'users.name as user_name'])->join('users', 'appointment'. '.'. $this->append, '=', 'users.id' )->where('users.id', $user_id)->when($this->status, function($query) {
            $query->where('status', $this->status);
        })->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);


        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
}    

public function sortBy($columnName, $position){


if($this->sortColumnName ===  $columnName){
    
    if($position === 'name'){
               $this->sortDirection = $this->swapSortDirection();
    }elseif($position === 'dresser'){

        $this->append = 'dresser_id';
        $this->sortDirection = $this->swapSortDirection();
    }else{
         $this->sortDirection = $this->swapSortDirection();
    }
            
 
}else{
    $this->sortDirection = 'asc';
}

$this->sortColumnName = $columnName;


}

public function swapSortDirection(){
    return $this->sortDirection === 'asc' ? 'desc' : 'asc';
}

}
