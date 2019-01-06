<?php

namespace App\Models\Access\User\Traits\Relationship;

use App\Models\Event\Event;
use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Orders\Orders;
use App\Models\Cart\Cart;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }    

    /**
     * User Orders
     * 
     * @return mixed
     */
    public function user_orders()
    {
        return $this->hasMany(Orders::class, 'user_id');
    }

    /**
     * User Cart
     * 
     * @return mixed
     */
    public function user_cart()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
}
