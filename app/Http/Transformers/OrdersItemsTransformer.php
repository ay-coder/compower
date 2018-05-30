<?php
namespace App\Http\Transformers;

use App\Http\Transformers;

class OrdersItemsTransformer extends Transformer
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
            "ordersitemsId" => (int) $item->id, "ordersitemsOrderId" =>  $item->order_id, "ordersitemsProductId" =>  $item->product_id, "ordersitemsQty" =>  $item->qty, "ordersitemsPrice" =>  $item->price, "ordersitemsShippingDate" =>  $item->shipping_date, "ordersitemsExpectedShippingDate" =>  $item->expected_shipping_date, "ordersitemsStatus" =>  $item->status, "ordersitemsCreatedAt" =>  $item->created_at, "ordersitemsUpdatedAt" =>  $item->updated_at, 
        ];
    }
}