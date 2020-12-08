<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function users() {
       return $this->belongsToMany('App\Model\User');
    }

    public function ranges() {
        return $this->belongsTo('App\Model\Range');
    }

    public function orders() {
        return $this->belongsToMany('App\Model\Order');
    }

    public function promotions() {
        return $this->belongsToMany('App\Model\Promotion');
    }

    public function reviews() {
        return $this->hasMany('App\Model\Review');
    }


}
