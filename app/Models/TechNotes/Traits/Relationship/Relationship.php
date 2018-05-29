<?php namespace App\Models\TechNotes\Traits\Relationship;

use App\Models\TechCategories\TechCategories;

trait Relationship
{
	/**
     * Belongs TO relations with Technical Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(TechCategories::class);
    }
}