<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Services extends Model
{
    use HasFactory;


      protected $fillable = ['name', 'prices', 'comission'];

        public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointment(){
        return $this->HasOne(Appointment::class);
    }

        public function transaction(){
            return $this->hasOne(Transaction::class);
        }

           public function cart(){
        return $this->hasOne(Transaction::class);
    }

     public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name', 'like', $term );
        });



    }
}
