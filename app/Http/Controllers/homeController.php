<?php

namespace App\Http\Controllers;

use App\Http\Requests\appointmentStoreRequest\appointmentStoreRequest;
use App\Models\Appointment;
use App\Models\Services;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        
         $hairDressers = User::role('cashier')->get();
        $services= Services::all();

        return view('userpage.index', compact( 'hairDressers', 'services'));
    }

    public function store(AppointmentStoreRequest $request)
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
        return to_route('user.appointment.index')->with('message', 'Appointment booked successfully');
        }else{
           return to_route('user.appointment.index')->with('message', 'unsuccesfull. Try again');
        }
    }
}
