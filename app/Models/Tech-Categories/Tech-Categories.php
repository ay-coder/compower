<?php namespace App\Models\Tech-Categories;

/**
 * Class Tech-Categories
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Tech-Categories\Traits\Attribute\Attribute;
use App\Models\Tech-Categories\Traits\Relationship\Relationship;

class Tech-Categories extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_tech_categories";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "title", "status", "created_at", "updated_at", 
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