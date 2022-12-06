<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class inventoryController extends Controller
{
     public function index(){

        $inventories = Inventory::all();
        return view('admin.inventory.index', compact('inventories'));
    }
}
