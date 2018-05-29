<?php namespace App\Models\Blogs;

/**
 * Class Blogs
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Blogs\Traits\Attribute\Attribute;
use App\Models\Blogs\Traits\Relationship\Relationship;

class Blogs extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_blogs";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "title", "sub_title", "description", "btntext", "additional_link", "image", "status", "created_at", "updated_at", 
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