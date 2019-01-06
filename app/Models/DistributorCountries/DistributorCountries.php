<?php namespace App\Models\DistributorCountries;

/**
 * Class DistributorCountries
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\DistributorCountries\Traits\Attribute\Attribute;
use App\Models\DistributorCountries\Traits\Relationship\Relationship;

class DistributorCountries extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_distributor_countries";

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