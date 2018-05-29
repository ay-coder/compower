<?php namespace App\Models\Tech-Categories\Traits\Relationship;

use App\Models\Tech-Notes\Tech-Notes;

trait Relationship
{
	/**
     * Has Many TO relations with Technical Notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notes()
    {
        return $this->belongsTo(Tech-Notes::class);
    }
}