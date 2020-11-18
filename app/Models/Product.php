<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ["eId", "title", "price"];
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

}
