@extends('frontend.layouts.app')

@section('sub-header')
    
<div class="row headimg">
    <div class="container">
        <div class="col-sm-8">
          <h1>
            My Cart
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
                    <a itemprop="url" href="{!! route('frontend.my-cart') !!}">
                        <span itemprop="title">My Cart</span>
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
      <td><strong> Product Title </strong></td>
      <td><strong> Image </strong></td>
      <td><strong> Quantity </strong></td>
      <td><strong> Action </strong></td>
    </tr>
    @if(isset($user->user_cart) && count($user->user_cart))
      @foreach($user->user_cart as $cartProduct)
        <tr id="container-{!! $cartProduct->id !!}">
          <td> {!! $cartProduct->product->title !!} </td>
          <td>
              @if(isset($cartProduct->product))
                {!! Html::image('/uploads/products/'.$cartProduct->product->image_1, $cartProduct->product->title, ['title'  => $cartProduct->product->title, 'width' => 300, 'height' => 150]) !!}
              @endif 
          </td>
          <td id="cartValue-{!! $cartProduct->id !!}"> {!! $cartProduct->qty !!}</td>
          <td>
              <a href="javascript:void(0);" data-value={!! $cartProduct->qty !!} data-id="{!! $cartProduct->id !!}" class="btn btn-success edit-cart-item">
                <i class="fa fa-pencil"></i>
              </a>

              <a href="javascript:void(0);" data-id="{!! $cartProduct->id !!}" class="btn btn-danger delete-cart-item">
                <i class="fa fa-close"></i>
              </a>
          </td>
      </tr>
      @endforeach

      <tr>
        <td colspan="4">
          <a href="{!! route('frontend.place-order') !!}" class="btn btn-success pull-right">
            Place Order
          </a>
        </td>
      </tr> 
    @else
      <tr>
        <td colspan="3">No Product Added in Cart!</td>
      </tr>
    @endif
  </table>
</div> 
@endsection

@section('after-scripts')
  <script type="text/javascript">
    var moduleConfig = {
        deleteCartItemUrl: '{!! route('frontend.remove-cart-product') !!}'
    };
    jQuery(document).ready(function()
    {
        bindDelete();
        bindEdit();
    });

    function bindDelete()
    {
        jQuery('.delete-cart-item').on('click', function(e)
        {
          var cartId = jQuery(e.target).closest('a').attr('data-id'),
              status = confirm("Are you sure?"),
              params = {
                cartId : cartId
              };
            if(status)
            {
              jQuery.ajax(
              {
                url:  '{!! route('frontend.remove-cart-product') !!}',
                type: 'POST',
                dataType: 'JSON',
                data: params,
                success: function(data)
                {
                    if(data.status == true)
                    {
                      jQuery("#container-"+cartId).hide();
                        toastr.success('Product Removed from Cart Successfully!');
                    }
                },
                error: function(data)
                {

                }
              });
            }
        });
    }

    function bindEdit()
    {
      jQuery('.edit-cart-item').on('click', function(e)
      {
        var cartId    = jQuery(e.target).closest('a').attr('data-id'),
            cartValue = jQuery(e.target).closest('a').attr('data-value'),
            params    = {
                cartId : cartId
              };

        jQuery("#cartValue-"+cartId).html('<input type="number" step="1" min="0" id="inputCartValue-'+ cartId +'" name="inputCartValue-'+ cartId +'" value="'+ cartValue +'"><i onclick="updateCartQty('+cartId+');" class="fa fa-check"></i>');
      });
    }

    function updateCartQty(cartId)
    {
      var cartValue = jQuery("#inputCartValue-"+cartId).val(),
          params    = {
          cartId    : cartId,
          cartValue : cartValue
      };

      jQuery.ajax(
      {
        url:  '{!! route('frontend.update-cart-product') !!}',
        type: 'POST',
        dataType: 'JSON',
        data: params,
        success: function(data)
        {
            if(data.status == true)
            {
              jQuery("#cartValue-"+cartId).html(cartValue);
              toastr.success('Cart Value Updated Successfully!');
            }
        },
        error: function(data)
        {

        }
      });
    }
  </script>
@endsection