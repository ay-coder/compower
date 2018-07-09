<?php namespace App\Models\Orders\Traits\Relationship;

use App\Models\OrdersItems\OrdersItems;
use App\Models\Access\User\User;

trait Relationship
{
	/**
     * Belongs TO relations with Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

	/**
     * Has Many relations with Order Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_items()
    {
        return $this->hasMany(OrdersItems::class, 'order_id');
    }
}