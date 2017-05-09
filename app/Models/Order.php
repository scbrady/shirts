<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['page_id',
        'first_name', 'last_name', 'email', 'phone',
        'address1', 'address2', 'city', 'state', 'zip',
        'quantity', 'extra', 'amount', 'stripe_id'];

    protected $casts = ['extra' => 'array'];
}
