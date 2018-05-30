<?php namespace App\Models\Orders;

/**
 * Class Orders
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Orders\Traits\Attribute\Attribute;
use App\Models\Orders\Traits\Relationship\Relationship;

class Orders extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_orders";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "order_number", "order_total", "description", "order_status", "status", "created_at", "updated_at", 
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