<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transactionDetailsController extends Controller
{
  
    public function index(){
        return view('admin.transaction.transaction_details');
    }
}
