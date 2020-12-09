<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function users() {
       return $this->belongsToMany('App\Models\User');
    }

    public function ranges() {
        return $this->belongsTo('App\Models\Range');
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order');
    }

    public function promotions() {
        return $this->belongsToMany('App\Models\Promotion');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }


}
