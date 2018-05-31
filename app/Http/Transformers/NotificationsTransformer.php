<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class NotificationsTransformer extends Transformer
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
            "notification_id"       => (int) $item->id,
            "user_id"               => (int) $item->user_id, 
            "description"           =>  $item->description, 
            "icon"                  =>  isset($item->icon) ? URL::to('/').'/uploads/notifications/'.$item->icon : '', 
            "is_read"               =>  $item->is_read
        ];
    }
}