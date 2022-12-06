<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    //

    public function index(){

        $transactions = Transaction::all();
        return view('admin.transaction.index', compact('transactions'));
    }

    public function getDetails($transaction){

        $transaction = Transaction::find($transaction);
        return view('admin.transaction.transaction_details', compact('transaction'));

    }

    public function  sales(){
         $transactions = Transaction::all();
        return view('admin.transaction.sales', compact('transactions'));
    }
}
