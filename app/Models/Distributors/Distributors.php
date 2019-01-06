<?php namespace App\Models\Distributors;

/**
 * Class Distributors
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Distributors\Traits\Attribute\Attribute;
use App\Models\Distributors\Traits\Relationship\Relationship;

class Distributors extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_distributors";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        "id", "country_id", "title", "contact", "phone", "fax", "address_line_one", "address_line_two", "city", "state", "zip", "country", "website", "email", "skype", "description", "status", "created_at", "updated_at", 
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