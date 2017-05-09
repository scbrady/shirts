<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['provider', 'provider_id', 'extra'];
    protected $casts = ['extra' => 'array'];
}
