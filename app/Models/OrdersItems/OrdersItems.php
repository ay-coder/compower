<?php namespace App\Models\OrdersItems;

/**
 * Class OrdersItems
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\OrdersItems\Traits\Attribute\Attribute;
use App\Models\OrdersItems\Traits\Relationship\Relationship;

class OrdersItems extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_order_items";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "order_id", "product_id", "qty", "price", "shipping_date", "expected_shipping_date",
        "shipping_status", "status", "created_at", "updated_at", 
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