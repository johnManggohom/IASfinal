<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class cartServicesController extends Controller
{
        public function index()
    {
        $services= Services::all();
        
        return view('admin.cashier.index' ,compact('services'));
    }

}
