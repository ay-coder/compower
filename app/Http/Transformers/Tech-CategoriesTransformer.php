<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class Tech-CategoriesTransformer extends Transformer
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
            "tech-categoriesId" => (int) $item->id, "tech-categoriesTitle" =>  $item->title, "tech-categoriesStatus" =>  $item->status, "tech-categoriesCreatedAt" =>  $item->created_at, "tech-categoriesUpdatedAt" =>  $item->updated_at, 
        ];
    }
}