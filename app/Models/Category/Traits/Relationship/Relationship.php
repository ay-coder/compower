<?php namespace App\Models\Category\Traits\Relationship;

use App\Models\Products\Products;

trait Relationship
{
	/**
     * Has Many relations with Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}