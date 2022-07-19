<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    // variabel ini untuk menentukan field apa saja yang dapat disimpan datannya

    protected $fillable= [
        'name',
        'photo',
        'slug'
    ];

    protected $hidden =[

    ];
}
