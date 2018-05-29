<?php
namespace App\Http\Transformers;

use URL;
use App\Http\Transformers;

class TechCategoriesTransformer extends Transformer
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
            "techcategoriesId" => (int) $item->id,
            "techcategoriesCategoryId" =>  $item->category_id, 
            "techcategoriesTitle" =>  $item->title, 
            "techcategoriesAdditionalLink" =>  $item->additional_link, 
            "techcategoriesStatus" =>  $item->status, 
            "techcategoriesCreatedAt" =>  $item->created_at, 
            "techcategoriesUpdatedAt" =>  $item->updated_at, 
        ];
    }

    public function transformCategoryCollection($items)
    {
        $response = [];

        if(isset($items) && count($items))
        {
            $sr = 0;
            foreach($items as $item)   
            {
                $response[$sr] = [ 
                    'category_id'   => (int) $item->id,
                    'title'         => $this->nulltoBlank($item->title),
                    'notes'         => []
                ];

                if(isset($item->notes) && count($item->notes))
                {
                    $notes = [];

                    foreach($item->notes as $note)
                    {
                        $notes[] = [
                            'note_id'           => (int) $note->id,
                            'title'             => $this->nulltoBlank($note->title),
                            'additional_link'   => isset($note->additional_link) ? URL::to('/').'/uploads/products/'.$note->additional_link : ''
                        ];
                    }

                    $response[$sr]['notes'] = $notes;
                }
                
                $sr++;
            }
        }

        return $response;
    }
}