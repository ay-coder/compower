<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class DistributorCountriesTransformer extends Transformer
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
            "distributorcountriesId" => (int) $item->id, "distributorcountriesTitle" =>  $item->title, "distributorcountriesStatus" =>  $item->status, "distributorcountriesCreatedAt" =>  $item->created_at, "distributorcountriesUpdatedAt" =>  $item->updated_at, 
        ];
    }
}