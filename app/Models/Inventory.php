<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
protected $guarded = ['id']; 
       protected $table= 'inventory';
    use HasFactory;
}
