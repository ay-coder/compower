@extends('frontend.layouts.app')

@section('sub-header')
    
<div class="row headimg">
    <div class="container">
        <div class="col-sm-8">
          <h1>
            My Orders
          </h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
            <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
                <li>
                    <a itemprop="url" href="/">
                        <span itemprop="title">Compower</span>
                    </a>
                </li>
                <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active">
                    <a itemprop="url" href="{!! route('frontend.my-orders') !!}">
                        <span itemprop="title">My Orders</span>
                    </a>
                </li>
            </ol>
        </div>
        <div class="col-sm-4 text-right">
        <a href="{!! route('frontend.get-a-quote') !!}" class="btn btn-danger pull-right">Get a Quote</a>
        </div>
    </div>
</div>

@stop

@section('content')
    <div class="row">
      <table class="table">
          <tr>
              <td> <strong>Order Number</strong> </td>
              <td> <strong>Order Total</strong> </td>
              <td> <strong>Order Status</strong> </td>
              <td> <strong>Order Description</strong> </td>
          </tr>
          
          @if(isset($user->user_orders) && count($user->user_orders))

            @foreach($user->user_orders as $userOrder)
              <tr>
                <td> {!! $userOrder->order_number !!} </td>
                <td> {!! $userOrder->order_total !!} </td>
                <td> {!! $userOrder->order_status !!} </td>
                <td> {!! $userOrder->description !!} </td>
              </tr>

              <tr>
                <td colspan="4">
                    <table class="table">
                        <tr>  
                          <td><strong>Product Title</strong></td>
                          <td><strong>Qty</strong></td>
                          <td><strong>Price</strong></td>
                          <td><strong>Shipping Date</strong></td>
                          <td><strong>Shipping Status</strong></td>
                        </tr>
                        @foreach($userOrder->order_items as $orderItem)
                          <tr>  
                            <td>{!! isset($orderItem->product) ? $orderItem->product->title : '' !!}</td>
                            <td>{!! $orderItem->qty !!}</td>
                            <td>{!! $orderItem->price !!}</td>
                            <td>{!! $orderItem->shipping_date !!}</td>
                            <td>{!! $orderItem->shipping_status !!}</td>
                          </tr>
                        @endforeach
                    </table>
                </td>
              </tr>
            @endforeach
          @endif
      </table>
    </div>
@endsection