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
            $sr = 0;
            foreach($item->products as $product)
            {
                $product = (object) $product;
                $productImage = $productChart = $productPdf = [];

                $productData[$sr] =[
                    'product_id'    => (int) $product->id,
                    'title'         => $this->nulltoBlank($product->title),
                    'model'         => $this->nulltoBlank($product->model),
                    'qty'           => (int) $product->qty,
                    'price'         => (float) $product->price,
                    'description'   => $this->nulltoBlank($product->description),
                    'features'      => $this->nulltoBlank($product->features),
                    'specifications'=> $this->nulltoBlank($product->specifications),
                    'images'        => [],
                    'charts'        => [],
                    'pdfs'          => []
                ];
                
                if(isset($product->image_1) && strlen($product->image_1) > 1)
                {
                    $productImages[] = URL::to('/').'/uploads/products/'.$product->image_1;
                }

                if(isset($product->image_2) && strlen($product->image_2) > 1)
                {
                    $productImages[] = URL::to('/').'/uploads/products/'.$product->image_2;
                }

                if(isset($product->image_3) && strlen($product->image_3) > 1)
                {
                    $productImages[] = URL::to('/').'/uploads/products/'.$product->image_3;
                }

                if(isset($product->image_4) && strlen($product->image_4) > 1)
                {
                    $productImages[] = URL::to('/').'/uploads/products/'.$product->image_4;
                }

                if(isset($product->image_5) && strlen($product->image_5) > 1)
                {
                    $productImages[] = URL::to('/').'/uploads/products/'.$product->image_5;
                }

                if(isset($product->chart_1) && strlen($product->chart_1) > 1)
                {
                    $productChart[] = URL::to('/').'/uploads/charts/'.$product->chart_1;
                }

                if(isset($product->chart_2) && strlen($product->chart_2) > 1)
                {
                    $productChart[] = URL::to('/').'/uploads/charts/'.$product->chart_2;
                }

                if(isset($product->chart_3) && strlen($product->chart_3) > 1)
                {
                    $productChart[] = URL::to('/').'/uploads/charts/'.$product->chart_3;
                }

                if(isset($product->pdf_1) && strlen($product->pdf_1) > 1)
                {
                    $productPdf[] = [
                        'title' => $this->nulltoBlank($product->pdf_title_1),
                        'pdf'   => URL::to('/').'/uploads/pdf/'.$product->pdf_1
                    ];
                }

                if(isset($product->pdf_2) && strlen($product->pdf_2) > 1)
                {
                    $productPdf[] = [
                        'title' => $this->nulltoBlank($product->pdf_title_2),
                        'pdf'   => URL::to('/').'/uploads/pdf/'.$product->pdf_2
                    ];
                }

                if(isset($product->pdf_3) && strlen($product->pdf_3) > 1)
                {
                    $productPdf[] = [
                        'title' => $this->nulltoBlank($product->pdf_title_3),
                        'pdf'   => URL::to('/').'/uploads/pdf/'.$product->pdf_3
                    ];
                }

                $productData[$sr]['charts'] = $productChart;
                $productData[$sr]['pdfs']   = $productPdf;
                $productData[$sr]['images'] = $productImages;
                $sr++;
            }
            
            $response['products'] = $productData;
        }

        return $response;
    }
}