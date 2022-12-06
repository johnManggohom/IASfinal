<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {

    

            return view('admin.index' );
         }
 
   
}
