<?php

namespace App\Http\Controllers\User\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\appointmentStoreRequest\appointmentStoreRequest;
use App\Models\Appointment;
use App\Models\Services;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardAppointmentController extends Controller
{
    public function index(){
           $hairDressers = User::role('cashier')->get();
        $services= Services::all();
        return view('userpage.dashboard.appointment',compact( 'hairDressers', 'services'));
 
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
        return to_route('user.dashboardUser')->with('message', 'Appointment Booked Successfully');
        }else{
           return to_route('user.dashboardUser')->with('message', 'unsuccesfull. Try again');
        }
    }
}
