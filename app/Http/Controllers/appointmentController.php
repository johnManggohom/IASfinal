<?php

namespace App\Http\Controllers;

use App\Http\Requests\appointmentStoreRequest;
use App\Models\Appointment;
use App\Models\Services;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{
    //

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $hairDressers =User::whereHas("roles", function($q){ $q->where("name", "cashier"); })->get();
        $services= Services::all();

        return view('admin.appointment.create', compact('user', 'hairDressers', 'services'));
    }


}
