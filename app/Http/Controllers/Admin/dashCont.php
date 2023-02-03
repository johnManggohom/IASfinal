<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class dashCont extends Controller
{
    public function index(){

      $gaga = auth()->user()->roles->pluck('name');
      


         if($gaga[0] == 'admin'){
            return to_route('admin.index');
         }elseif($gaga[0] == 'cashier'){
            return view('cashier.index');
         }elseif($gaga[0] == 'user'){
            return to_route('user.index');
         }

    }
}
