<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'favorites');
    }

    public function ranges()
    {
        return $this->belongsTo('App\Models\Range');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_products')->withPivot('quantity');
    }

    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion', 'promotion_products')->withPivot('discount');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}
