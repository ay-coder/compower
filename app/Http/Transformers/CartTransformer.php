<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class CartTransformer extends Transformer
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

        $productPdf = $productChart = $productImages = [];

        $item->user     = (object) $item->user;
        $item->product  = (object) $item->product;
        $product        = $item->product;

        $response = [
            "cart_id"       => (int) $item->id,
            "user_id"       => (int) $item->user_id,
            "product_id"    => (int) $item->product_id,
            "qty"           => (int) $item->qty, 
            "title"         => $item->product->title,
            "model"         => $item->product->model,
            "price"         => (float) $item->product->price,
            "total"         => (float) $item->product->price * $item->qty,
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

    public function showCart($items)
    {
        $response = [
            'total_items'   => 0,
            'cart_total'    => 0
        ];

        $productPdf = $productChart = $productImages = [];

        if($items)
        {
            $cartTotal = $totalItems = 0 ;
            $sr = 0;

            foreach($items as $item)
            {
                $item->user     = (object) $item->user;
                $item->product  = (object) $item->product;
                $product        = $item->product;
                $cartTotal      = $cartTotal + ($item->product->price * $item->qty );
                $productImages  = [];

                $totalItems++;

                $response['items'][$sr] = [
                    "cart_id"       => (int) $item->id,
                    "user_id"       => (int) $item->user_id,
                    "product_id"    => (int) $item->product_id,
                    "qty"           => (int) $item->qty, 
                    "title"         => $item->product->title,
                    "model"         => $item->product->model,
                    "price"         => (float) $item->product->price,
                    "total"         => (float) $item->product->price * $item->qty,
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

                $response['items'][$sr]['charts'] = $productChart;
                $response['items'][$sr]['pdfs']   = $productPdf;
                $response['items'][$sr]['images'] = $productImages;

                $sr++;
            }
        }

        $response['total_items']    = $totalItems;
        $response['cart_total']     = $cartTotal;
        return $response;
    }
}