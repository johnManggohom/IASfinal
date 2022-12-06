<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment';
    protected $fillable = ['user_id',
    'dresser_id',
    'service_id',
    'appointment_price',
    'start_time',
    'end_time','status'];

  public function user(){
        return $this->belongsTo(User::class);
    }

      public function dresser(){
        return $this->belongsTo(User::class);
    }

      public function service(){
        return $this->belongsTo(Services::class);
    }
    
        public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('appointment_price', 'like', $term )->orWhereHas('service', function($query) use($term) { $query->where('name','LIKE',$term);})->orWhereHas('user', function($query) use($term) { $query->where('name','LIKE',$term);
  })->orWhereHas('dresser', function($query) use($term) {
    $query->where('name','LIKE',$term);
  });
        });



    }
}
