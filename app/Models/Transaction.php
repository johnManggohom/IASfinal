<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $dates = ['end_time'];

    public $fillable = ['user_id', 'dresser_id', 'service_id', 'start_time', 'end_time', 'appointment_price', 'invoice_number'];

    
       public function service(){
        return $this->belongsTo(Services::class);
    }
  public function user(){
        return $this->belongsTo(User::class);
    }


    public function services(){
return $this->belongstoMany(Services::class, 'service_transaction', 'transaction_id', 'service_id')->withPivot('price', 'quantity');
    }
     public function dresser(){
        return $this->belongsTo(User::class);
    }

    public function wage(){
        return $this->hasOne(Wage::class);
    }


     public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
           $query->whereHas('user', function($query) use($term) { $query->where('name','LIKE',$term);});
        });
    }

    // public static function scopeSearchNo($query, $term){

    //     $term= "%$term%";

    //     $query->where(function ($query) use ($term){
    //        $query->whereHas('user', function($query) use($term) { $query->where('transaction_number','LIKE',$term);});
    //     });
    // }
    
    public function scopeSearchNo($query, $term){
    return $query->where(fn ($query) => $query->where('invoice_number', 'like', '%'.$term.'%'));
}
}
