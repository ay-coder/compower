<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class ProductsTransformer extends Transformer
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
                'product_id'    => (int) $item->id,
                'category_id'   => (int) $item->category['id'],
                'category_title'=> $item->category['title'],
                'title'         => $this->nulltoBlank($item->title),
                'model'         => $this->nulltoBlank($item->model),
                'qty'           => (int) $item->qty,
                'price'         => (float) $item->price,
                'description'   => $this->nulltoBlank($item->description),
                'features'      => $this->nulltoBlank($item->features),
                'specifications'=> $this->nulltoBlank($item->specifications),
                'image_1'       => isset($item->image_1) ? URL::to('/').'/uploads/products/' . $item->image_1 : '',
                'image_2'       => isset($item->image_2) ? URL::to('/').'/uploads/products/' . $item->image_2 : '',
                'image_3'       => isset($item->image_3) ? URL::to('/').'/uploads/products/' . $item->image_3 : '',
                'image_4'       => isset($item->image_4) ? URL::to('/').'/uploads/products/' . $item->image_4 : '',
                'image_5'       => isset($item->image_5) ? URL::to('/').'/uploads/products/' . $item->image_5 : '',
                'chart_1'       => isset($item->chart_1) ? URL::to('/').'/uploads/charts/' . $item->chart_1 : '',
                'chart_2'       => isset($item->chart_2) ? URL::to('/').'/uploads/charts/' . $item->chart_2 : '',
                'chart_3'       => isset($item->chart_3) ? URL::to('/').'/uploads/charts/' . $item->chart_3 : '',
                'pdf_title_1'   => $this->nulltoBlank($item->pdf_title_1),
                'pdf_1'         => isset($item->pdf_1) ? URL::to('/').'/uploads/pdf/' . $item->pdf_1 : '',
                'pdf_title_2'   => $this->nulltoBlank($item->pdf_title_2),
                'pdf_2'         => isset($item->pdf_2) ? URL::to('/').'/uploads/pdf/' . $item->pdf_2 : '',
                'pdf_title_3'   => $this->nulltoBlank($item->pdf_title_3),
                'pdf_3'         => isset($item->pdf_3) ? URL::to('/').'/uploads/pdf/' . $item->pdf_3 : ''
            ];
    }
}