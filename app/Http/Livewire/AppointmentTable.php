<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentTable extends Component
{

    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
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

        return view('livewire.appointment-table', [
            'appointments'=> $this->pages()->paginate($this->perPage)
        ]);
    }

    protected function pages()
{
    return Appointment::select(['appointment.*', 'users.name as user_name'])->join('users', 'appointment'. '.'. $this->append, '=', 'users.id' )->when($this->status, function($query) {
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
