<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index(){
        return view('admin.users.clients.index');
    }
}
