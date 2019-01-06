<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class TestimonialsTransformer extends Transformer
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
            "testimonialsId" => (int) $item->id, "testimonialsName" =>  $item->name, "testimonialsCompany" =>  $item->company, "testimonialsEmail" =>  $item->email, "testimonialsLocation" =>  $item->location, "testimonialsRate" =>  $item->rate, "testimonialsDescription" =>  $item->description, "testimonialsStatus" =>  $item->status, "testimonialsCreatedAt" =>  $item->created_at, "testimonialsUpdatedAt" =>  $item->updated_at, 
        ];
    }
}