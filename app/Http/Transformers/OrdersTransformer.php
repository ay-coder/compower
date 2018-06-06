<?php
namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class OrdersTransformer extends Transformer
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
            "ordersId" => (int) $item->id, "ordersOrderNumber" =>  $item->order_number, "ordersOrderTotal" =>  $item->order_total, "ordersDescription" =>  $item->description, "ordersOrderStatus" =>  $item->order_status, "ordersStatus" =>  $item->status, "ordersCreatedAt" =>  $item->created_at, "ordersUpdatedAt" =>  $item->updated_at, 
        ];
    }

    /**
     * Single Order Transform
     * 
     * @param object $order
     * @return array
     */
    public function singleOrderTransform($order)
    {
        $response = [];

        
        $response = [
            'order_id'      => (int) $order->id,
            'order_number'  => $this->nulltoBlank($order->order_number),
            'order_total'   => (float) $order->order_total,
            'description'   => $this->nulltoBlank($order->description),
            'order_status'  => $this->nulltoBlank($order->order_status),
            'items'         => []
       ];

       if(isset($order->order_items) && count($order->order_items))
       {
            $orderItems = [];

            foreach($order->order_items as $item)    
            {
                $orderItems[] = [
                    'product_id'    => (int) $item->product_id,
                    'product_title' => $this->nulltoBlank($item->product->title),
                    'product_model' => $this->nulltoBlank($item->product->model),
                    'product_image' => isset($item->product->image_1) ?  URL::to('/').'/uploads/products/'.$item->product->image_1 : '',
                    'qty'           => (int) $item->qty,
                    'price'         => (float) $item->price,
                    'item_total'    => $item->qty * $item->price,
                    'item_status'   => 'Pending',
                    'shipping_date' => isset($item->shipping_date) ? date('d F Y', strtotime($item->shipping_date)) : '',
                    'expected_date' => isset($item->expected_shipping_date) ? 'Before '. date('d F Y', strtotime($item->expected_shipping_date)) : ''
                ];

            }

            $response['items'] = $orderItems;
       }
        
        return $response;
    }

    public function orderTransform($items)
    {
        $response = [];

        if(isset($items) && count($items))
        {
            $sr = 0;
            foreach($items as $order)
            {
                $response[$sr] = [
                    'order_id'      => (int) $order->id,
                    'order_number'  => $this->nulltoBlank($order->order_number),
                    'order_total'   => (float) $order->order_total,
                    'description'   => $this->nulltoBlank($order->description),
                    'order_status'  => $this->nulltoBlank($order->order_status),
                    'items'         => []
               ];

               if(isset($order->order_items) && count($order->order_items))
               {
                    $orderItems = [];

                    foreach($order->order_items as $item)    
                    {
                        $orderItems[] = [
                            'product_id'    => (int) $item->product_id,
                            'product_title' => $this->nulltoBlank($item->product->title),
                            'product_model' => $this->nulltoBlank($item->product->model),
                            'product_image' => isset($item->product->image_1) ?  URL::to('/').'/uploads/products/'.$item->product->image_1 : '',
                            'qty'           => (int) $item->qty,
                            'price'         => (float) $item->price,
                            'item_total'    => $item->qty * $item->price,
                            'item_status'   => 'Pending',
                            'shipping_date' => isset($item->shipping_date) ? date('d F Y', strtotime($item->shipping_date)) : '',
                            'expected_date' => isset($item->expected_shipping_date) ? 'Before '. date('d F Y', strtotime($item->expected_shipping_date)) : ''
                        ];

                    }

                    $response[$sr]['items'] = $orderItems;
               }
                $sr++;
            }
            return $response;
        }
    }

}