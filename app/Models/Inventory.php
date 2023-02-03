<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
protected $guarded = ['id']; 
       protected $table= 'inventory';
    use HasFactory;

public function scopeSearch($query, $term){
    return $query->where(fn ($query) => $query->where('name', 'like', '%'.$term.'%'));
}
}
