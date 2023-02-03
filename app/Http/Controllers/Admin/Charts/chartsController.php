<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class chartsController extends Controller
{
    public function index(){
        return view('admin.dashboard.dashboard_index');
    }
}
