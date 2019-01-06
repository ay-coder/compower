<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class PagesTransformer extends Transformer
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
            "pagesId" => (int) $item->id, "pagesTitle" =>  $item->title, "pagesSlug" =>  $item->slug, "pagesMetaTitle" =>  $item->meta_title, "pagesMetaDescription" =>  $item->meta_description, "pagesShortDescription" =>  $item->short_description, "pagesFullDescription" =>  $item->full_description, "pagesIcon" =>  $item->icon, "pagesImage" =>  $item->image, "pagesOptions" =>  $item->options, "pagesStatus" =>  $item->status, "pagesCreatedAt" =>  $item->created_at, "pagesUpdatedAt" =>  $item->updated_at, 
        ];
    }
}