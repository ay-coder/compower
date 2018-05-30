<?php namespace App\Models\OrdersItems\Traits\Relationship;

use App\Repositories\Orders\Orders;
use App\Models\Products\Products;

trait Relationship
{
	/**
     * Belongs TO relations with Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    /**
     * Belongs TO relations with Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}