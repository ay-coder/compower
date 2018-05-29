<?php namespace App\Models\TechCategories\Traits\Relationship;

use App\Models\TechNotes\TechNotes;

trait Relationship
{
	/**
     * Has Many  relations with Technical Notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notes()
    {
        return $this->hasMany(TechNotes::class, 'category_id');
    }
}