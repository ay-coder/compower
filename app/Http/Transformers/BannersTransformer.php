<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class BannersTransformer extends Transformer
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
            "bannersId" => (int) $item->id, "bannersTitle" =>  $item->title, "bannersImage" =>  $item->image, "bannersStatus" =>  $item->status, "bannersCreatedAt" =>  $item->created_at, "bannersUpdatedAt" =>  $item->updated_at, 
        ];
    }
}