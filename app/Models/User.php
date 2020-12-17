<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Product;

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
        return $this->hasMany('App\Models\Order');
    }

    public function billingAddress()
    {
        return $this->hasOne('App\Models\BillingAddress');
    }

    public function deliveryAddress()
    {
        return $this->hasOne('App\Models\DeliveryAddress');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function getAdminAttribute()
    {
        return $this->roles_id === 2;
    }

    // -------- FAVORITES -------------------------------------------------------------------
    public function likes()
    {
        return $this->belongsToMany('App\Models\Product', 'favorites');
    }

    public function like(Product $product)
    {
        return $this->likes()->attach($product->id);
    }

    public function dislike(Product $product)
    {
        return $this->likes()->detach($product); 
    }

    public function isLiked(Product $product)
    {
        return $this->likes()->where('product_id', $product->id)->exists();
    }

    public function toggleLike(Product $product)
    {
        if ($this->isLiked($product))
        {
            return $this->dislike($product);

        } else {
            return $this->like($product);
        }
    }
}
