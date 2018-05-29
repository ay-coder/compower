<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class BlogsTransformer extends Transformer
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
            "blog_id"           => (int) $item->id, 
            "title"             =>  $item->title, 
            "subtitle"          =>  $item->sub_title, 
            "description"       =>  $item->description, 
            "btn_text"          =>  $item->btntext, 
            "additional_link"   =>  isset($item->additional_link) ? $item->additional_link : '',
            "image"             =>  isset($item->image) ? URL::to('/').'/uploads/blog/'.$item->image : '' 
        ];
    }
}