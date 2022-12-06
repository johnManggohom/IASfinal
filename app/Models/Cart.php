<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

      protected $fillable = [
        'service_id', 
        'price', 
      'quantity'];
   protected  $table= 'cart';
    use HasFactory;

    public function service(){
          return $this->belongsTo(Services::class);
    }
}
