<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class Tech-NotesTransformer extends Transformer
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
            "tech-notesId" => (int) $item->id, "tech-notesCategoryId" =>  $item->category_id, "tech-notesTitle" =>  $item->title, "tech-notesAdditionalLink" =>  $item->additional_link, "tech-notesStatus" =>  $item->status, "tech-notesCreatedAt" =>  $item->created_at, "tech-notesUpdatedAt" =>  $item->updated_at, 
        ];
    }
}