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

        $product = $item;

        $response = [
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

            $response['charts'] = $productChart;
            $response['pdfs']   = $productPdf;
            $response['images'] = $productImages;

        return $response;
    }
}