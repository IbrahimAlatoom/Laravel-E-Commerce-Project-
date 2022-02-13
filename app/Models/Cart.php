<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // because both of the table in singular you need to override the table name to connect to the database 
    public $table = "cart";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }

    
}
