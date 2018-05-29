<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class TechNotesTransformer extends Transformer
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
            "technotesId" => (int) $item->id, "technotesCategoryId" =>  $item->category_id, "technotesTitle" =>  $item->title, "technotesAdditionalLink" =>  $item->additional_link, "technotesStatus" =>  $item->status, "technotesCreatedAt" =>  $item->created_at, "technotesUpdatedAt" =>  $item->updated_at, 
        ];
    }
}