<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = "cart";
    use HasFactory;


    protected $fillable= [
        'products_id',
        'users_id',
        'portion'
    ];

    protected $hidden =[

    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }


    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    //  public function transaction(){
    //     return $this->hasOne(User::class, 'id', 'transactions_id');
    // }
}
