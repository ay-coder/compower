<?php namespace App\Models\Banners\Traits\Relationship;

use App\Models\Category\Category;

trait Relationship
{
	/**
     * Belongs TO relations with Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}