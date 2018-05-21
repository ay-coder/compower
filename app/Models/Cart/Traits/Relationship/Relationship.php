<?php namespace App\Models\Cart\Traits\Relationship;

use App\Models\Products\Products;
use App\Models\Access\User\User;

trait Relationship
{
	/**
     * Belongs TO relations with Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * Belongs TO relations with User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}