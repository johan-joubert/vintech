<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    // added by Alexis
    protected $fillable = [
        'address', 
        'zip_code', 
        'city', 
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
