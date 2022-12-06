<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\appointmentStoreRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{
    public function index(){
        return view('admin.appointment.index');
    }

     public function create(){
        $user=Auth::user();
        $hairDressers = User::role('cashier')->get();
        $services= Services::all();

        return view('admin.appointment.create', compact('user', 'hairDressers', 'services'));
    }
     public function pdf(){
        return view('admin.appointment.appointmentpdf');
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(appointmentStoreRequest $request)
    {        

     
        
        $user = Auth::id();
        // $request->time = Carbon::parse( $request->time)->format('H:i:s');
        // $datetime = $request->date.' '.$request->time;
        // $datetime = \DateTime::createFromFormat('d/m/Y H:i:s', $datetime)->format('Y-m-d H:i:s');
        // $request['start_time'] = $datetime;
        // $newDateTime = 
        $request['end_time'] = Carbon::parse( $request->start_time)->addHour();
        $price= DB::table('services')->where('id',$request->service_id)->value('prices');
        $request->request->add([
        'user_id'=>$user,   
        'appointment_price'=>$price
    ]);         


$message =   Appointment::create($request->all());
        if ($message->exists) {
        return view('admin.appointment.index')->with('message', 'Appointment finished');
        }else{
           return view('admin.appointment.index')->with('message', 'unsuccesfull. Try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Appointment $appointment)
    {       

         $update= Appointment::find($appointment->id);
        
         $update->status = 'accepted';
          $update->save();



         return to_route('admin.appointment.index');
    }


public function rejectAppointment(Appointment $appointment) {

        $update= Appointment::find($appointment->id);
        

         $update->status = 'rejected';
          $update->save();

         return to_route('admin.appointment.index');
}

public function finishedAppointment(Appointment $appointment) {

        $update= Appointment::find($appointment->id);
       


                            try{
        DB::transaction(function() use($update){
           
            $transaction_id = Helper::IDGenerator(new Transaction, 'invoice_number', 5, 'TRN');

                        $transaction = Transaction::create([
                                'user_id' => $update->user_id, 
                                'dresser_id'=> $update->dresser_id, 
                                'service_id'=>$update->service_id,
                                'appointment_price'=>  $update->appointment_price,
                                'start_time' =>  $update->start_time,
                                'end_time' =>  $update->end_time,
                                'invoice_number' => $transaction_id
                                        ]);




          $commision = ($update->service->comission / 100) ;
      
      
            $transaction->services()->attach($transaction->service_id , [
                'quantity' => 1,
                'price' => $transaction->appointment_price
            ]);

            $transaction->increment('appointment_price',  1  *  $transaction->appointment_price);
        

        
        Wage::create([
            'user_id' => $update->dresser_id, 
            'service_id'=> $update->service_id,
            'commission'=> $update->appointment_price *.4,
            'transaction_id' => $transaction->id,
             'invoice_number' => $transaction_id

        ]);

    
        $update->update(['status'=>'finished']);

        
        }
    
    
    );
    
      
         return to_route('admin.appointment.index')->with('message', 'success');}catch(\Exception $exception){
              return to_route('admin.appointment.index')->with('message', $exception->getMessage());
        }
}
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
      
         $appointment->delete();
           return to_route('admin.appointment.index');
        //
    }
}
