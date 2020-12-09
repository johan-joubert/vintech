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
     * The attributes that are mass assignable. / by Alexis
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'chickname',
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

    // password protection / by Alexis
    public function setPasswordAttributes($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    public function billingAddresses()
    {
        return $this->hasOne('App\Model\BillingAddress');
    }

    public function deliveryAddresses()
    {
        return $this->hasOne('App\Model\DeliveryAddress');
    }

    public function roles()
    {
        return $this->belongsTo('App\Model\Role');
    }

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }

    public function reviews()
    {
        return $this->hasMany('App\Model\Review');
    }
}
