<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeExpensesRequest;
use App\Models\Expenses;
use Dotenv\Validator;
use Illuminate\Http\Request;

class expensesController extends Controller
{
    //

    public function index(){

        $expenses = Expenses::all();
        return view('admin.transaction.expenses.index',compact('expenses'));
    }
/**
 * Store the incoming blog post.
 *
 * @param  Request  $request
 * @return Response
 */
    public function store(storeExpensesRequest $request){


        $message =   Expenses::create($request->all());

    
        if ($message->exists) {
        return view('admin.transaction.expenses.index')->with('message', 'Expense stored Succesfully');
        }else{
           return view('admin.transaction.expenses.index')->with('message', 'unsuccesfull. Try again');
        }
    }

 
 
    }

