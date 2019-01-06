<?php namespace App\Models\DistributorCountries\Traits\Relationship;

use App\Models\Distributors\Distributors;

trait Relationship
{
	public function distributors()
	{
		return $this->hasMany(Distributors::class, 'country_id');
	}
}