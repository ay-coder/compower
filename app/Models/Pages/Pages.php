<?php namespace App\Models\Pages;

/**
 * Class Pages
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Pages\Traits\Attribute\Attribute;
use App\Models\Pages\Traits\Relationship\Relationship;

class Pages extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_pages";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "title", "slug", "data_key", "meta_title", "meta_description", "short_description", "full_description", "icon", "image", "options", "status", "created_at", "updated_at", 
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