<?php namespace App\Models\Notifications;

/**
 * Class Notifications
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Notifications\Traits\Attribute\Attribute;
use App\Models\Notifications\Traits\Relationship\Relationship;

class Notifications extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_notifications";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "user_id",
        "product_id",
        "notification_type", "description", "icon", "is_read", "read_time", "status", "created_at", "updated_at", 
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