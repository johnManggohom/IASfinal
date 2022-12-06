<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{

    protected $table = 'wages'; 
    
      protected $fillable = ['user_id', 'service_id', 'commission', 'transaction_id','invoice_number'];
    use HasFactory;

 public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(){
      return $this->belongsTo(Transaction::class);
    }
}
