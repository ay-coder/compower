<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class CategoryTransformer extends Transformer
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

        $response =  [
            "category_id"       => (int) $item->id,
            "category_title"    =>  $item->title,
            "products"          => []
        ];

        if(isset($item->products) && count($item->products))
        {
            $productData = [];

            foreach($item->products as $product)
            {
                $product = (object) $product;

                $productData[] =[
                    'product_id'    => (int) $product->id,
                    'title'         => $this->nulltoBlank($product->title),
                    'model'         => $this->nulltoBlank($product->model),
                    'qty'           => (int) $product->qty,
                    'price'         => (float) $product->price,
                    'description'   => $this->nulltoBlank($product->description),
                    'features'      => $this->nulltoBlank($product->features),
                    'specifications'=> $this->nulltoBlank($product->specifications),
                    'image_1'       => isset($product->image_1) ? URL::to('/').'/uploads/products/' . $product->image_1 : '',
                    'image_2'       => isset($product->image_2) ? URL::to('/').'/uploads/products/' . $product->image_2 : '',
                    'image_3'       => isset($product->image_3) ? URL::to('/').'/uploads/products/' . $product->image_3 : '',
                    'image_4'       => isset($product->image_4) ? URL::to('/').'/uploads/products/' . $product->image_4 : '',
                    'image_5'       => isset($product->image_5) ? URL::to('/').'/uploads/products/' . $product->image_5 : '',
                    'chart_1'       => isset($product->chart_1) ? URL::to('/').'/uploads/charts/' . $product->chart_1 : '',
                    'chart_2'       => isset($product->chart_2) ? URL::to('/').'/uploads/charts/' . $product->chart_2 : '',
                    'chart_3'       => isset($product->chart_3) ? URL::to('/').'/uploads/charts/' . $product->chart_3 : '',
                    'pdf_title_1'   => $this->nulltoBlank($product->pdf_title_1),
                    'pdf_1'         => isset($product->pdf_1) ? URL::to('/').'/uploads/pdf/' . $product->pdf_1 : '',
                    'pdf_title_2'   => $this->nulltoBlank($product->pdf_title_2),
                    'pdf_2'         => isset($product->pdf_2) ? URL::to('/').'/uploads/pdf/' . $product->pdf_2 : '',
                    'pdf_title_3'   => $this->nulltoBlank($product->pdf_title_3),
                    'pdf_3'         => isset($product->pdf_3) ? URL::to('/').'/uploads/pdf/' . $product->pdf_3 : '',
                ];
            }
            
            $response['products'] = $productData;
        }

        return $response;
    }
}