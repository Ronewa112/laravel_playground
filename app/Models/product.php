<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    //to disable timestamps

    public $timestamps = false;
    protected $primaryKey = 'idproduct';

    protected $fillable = [
        'name',
        'price'
    ];

}
