<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_transaction extends Model
{

       protected $table = 'service_transaction';
    protected $fillable = ['service_id', 'transaction_id'];
    use HasFactory;
}
