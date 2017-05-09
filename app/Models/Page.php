<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'description', 'amount'];

    public function products() {
        return $this->hasMany('App\Models\Product');
    }

    public function pictures() {
        return $this->hasMany('App\Models\Picture');
    }
}
