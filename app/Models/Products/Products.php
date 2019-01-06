<?php namespace App\Models\Products;

/**
 * Class Products
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Products\Traits\Attribute\Attribute;
use App\Models\Products\Traits\Relationship\Relationship;

class Products extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_products";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "category_id", "title", "slug", "model", "qty", "price", "stock", "description", "features", "specifications", "chart_1", "chart_2", "chart_3", "pdf_1", "pdf_title_1", "pdf_2", "pdf_title_2", "pdf_3", "pdf_title_3", "image_1", "image_2", "image_3", "image_4", "image_5", "status", "created_at", "updated_at", 
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