<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable= [
        'users_id',
        'insurance_price',
        'shipping_price',
        'total_price',
        'transactions_status',
        'code'
    ];

    protected $hidden=[];

}
