<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'users_id',
        'shipping_date',
        'delivery_fee',
        'total_price',
        'transaction_status',
        'code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');

    }

    public function transactiondetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');

    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class, 'transactions_id', 'id');

    // }
}
