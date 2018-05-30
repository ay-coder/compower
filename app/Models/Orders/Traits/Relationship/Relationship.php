<?php namespace App\Models\Orders\Traits\Relationship;

use App\Models\OrdersItems\OrdersItems;

trait Relationship
{
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