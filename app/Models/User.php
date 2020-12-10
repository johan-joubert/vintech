<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function billingAddress() {
        return $this->hasOne('App\Models\BillingAddress');
    }

    public function deliveryAddress() {
        return $this->hasOne('App\Models\DeliveryAddress');
    }

    public function roles() {
        return $this->belongsTo('App\Models\Role');
    }

    public function products() {
        return $this->belongsToMany('App\Models\Product');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }


}
