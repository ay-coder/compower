<?php namespace App\Models\Banners;

/**
 * Class Banners
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Banners\Traits\Attribute\Attribute;
use App\Models\Banners\Traits\Relationship\Relationship;

class Banners extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_banners";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "category_id", "title", "image", "status", "created_at", "updated_at", 
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