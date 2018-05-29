<?php namespace App\Models\TechCategories;

/**
 * Class TechCategories
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\TechCategories\Traits\Attribute\Attribute;
use App\Models\TechCategories\Traits\Relationship\Relationship;

class TechCategories extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_tech_notes";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "category_id", "title", "additional_link", "status", "created_at", "updated_at", 
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