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

        $item->user     = (object) $item->user;
        $item->product  = (object) $item->product;

        return [
            "cart_id"       => (int) $item->id,
            "user_id"       => (int) $item->user_id,
            "product_id"    => (int) $item->product_id,
            "qty"           => (int) $item->qty, 
            "title"         => $item->product->title,
            "model"         => $item->product->model,
            "price"         => $item->product->price,
            "total"         => $item->product->price * $item->qty,
            'image_1'       => isset($item->product->image_1) ? URL::to('/').'/uploads/products/' . $item->product->image_1 : '',
            'image_2'       => isset($item->product->image_2) ? URL::to('/').'/uploads/products/' . $item->product->image_2 : '',
            'image_3'       => isset($item->product->image_3) ? URL::to('/').'/uploads/products/' . $item->product->image_3 : '',
            'image_4'       => isset($item->product->image_4) ? URL::to('/').'/uploads/products/' . $item->product->image_4 : '',
            'image_5'       => isset($item->product->image_5) ? URL::to('/').'/uploads/products/' . $item->product->image_5 : ''
        ];
    }

    public function showCart($items)
    {
        $response = [
            'total_items'   => 0,
            'cart_total'    => 0
        ];

        if($items)
        {
            $cartTotal = $totalItems = 0 ;

            foreach($items as $item)
            {
                $item->user     = (object) $item->user;
                $item->product  = (object) $item->product;
                $cartTotal      = $cartTotal + ($item->product->price * $item->qty );

                $totalItems++;

                $response['items'][] = [
                    "cart_id"       => (int) $item->id,
                    "user_id"       => (int) $item->user_id,
                    "product_id"    => (int) $item->product_id,
                    "qty"           => (int) $item->qty, 
                    "title"         => $item->product->title,
                    "model"         => $item->product->model,
                    "price"         => $item->product->price,
                    "total"         => $item->product->price * $item->qty,
                    'image_1'       => isset($item->product->image_1) ? URL::to('/').'/uploads/products/' . $item->product->image_1 : '',
                    'image_2'       => isset($item->product->image_2) ? URL::to('/').'/uploads/products/' . $item->product->image_2 : '',
                    'image_3'       => isset($item->product->image_3) ? URL::to('/').'/uploads/products/' . $item->product->image_3 : '',
                    'image_4'       => isset($item->product->image_4) ? URL::to('/').'/uploads/products/' . $item->product->image_4 : '',
                    'image_5'       => isset($item->product->image_5) ? URL::to('/').'/uploads/products/' . $item->product->image_5 : ''
                ];
            }
        }

        $response['total_items']    = $totalItems;
        $response['cart_total']     = $cartTotal;
        return $response;
    }
}