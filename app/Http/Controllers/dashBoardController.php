<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashBoardController extends Controller
{
    public function index(){
        return view('userpage.dashboard');
    }
}
