<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class DistributorsTransformer extends Transformer
{
    /**
     * Transform
     *
     * @param array $data
     * @return array
     */
    public function transform($item)
    {
        if(is_array($item))
        {
            $item = (object)$item;
        }

        return [
            "distributorsId" => (int) $item->id, "distributorsCountryId" =>  $item->country_id, "distributorsTitle" =>  $item->title, "distributorsContact" =>  $item->contact, "distributorsPhone" =>  $item->phone, "distributorsFax" =>  $item->fax, "distributorsAddressLineOne" =>  $item->address_line_one, "distributorsAddressLineTwo" =>  $item->address_line_two, "distributorsCity" =>  $item->city, "distributorsState" =>  $item->state, "distributorsZip" =>  $item->zip, "distributorsCountry" =>  $item->country, "distributorsWebsite" =>  $item->website, "distributorsEmail" =>  $item->email, "distributorsSkype" =>  $item->skype, "distributorsDescription" =>  $item->description, "distributorsStatus" =>  $item->status, "distributorsCreatedAt" =>  $item->created_at, "distributorsUpdatedAt" =>  $item->updated_at, 
        ];
    }
}