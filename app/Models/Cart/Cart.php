<?php namespace App\Models\Cart;

/**
 * Class Cart
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Cart\Traits\Attribute\Attribute;
use App\Models\Cart\Traits\Relationship\Relationship;

class Cart extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_cart";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "user_id", "product_id", "qty", "status", "created_at", "updated_at", 
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