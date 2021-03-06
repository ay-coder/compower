<?php namespace App\Models\Category;

/**
 * Class Category
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Category\Traits\Attribute\Attribute;
use App\Models\Category\Traits\Relationship\Relationship;

class Category extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_categories";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "title", "slug", "small_description", "image", "description", "status", "created_at", "updated_at", 
    ];

    /**
     * Timestamp flag
     *
     */
    public $timestamps = true;

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}