@extends ('backend.layouts.app')

@section ('title', isset($repository->moduleTitle) ? 'Edit - '. $repository->moduleTitle : 'Edit')

@section('page-header')
    <h1>
        {{$repository->moduleTitle}}
        <small>Edit</small>
    </h1>
@endsection

@section('content')
<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">
                        {{$item->user->name}}
                    </h3>

                    <p class="text-muted text-center">
                        {{$item->user->email}}
                    </p>

                    <p class="text-muted text-center">
                        Status : {{$item->order_status}}
                    </p>

                    <p class="text-muted text-center">
                        <strong>Total Cost : {{ $item->order_total }} </strong>
                    </p>

                    <select id="orderStatus" class="form-control">
                        <option 
                            {!! $item->order_status == 'Pending' ? 'selected="selected"' : '' !!}>
                            Pending
                        </option>
                        <option {!! $item->order_status == 'In Progress' ? 'selected="selected"' : '' !!}>
                            In Progress
                        </option>
                        <option {!! $item->order_status == 'Shipped' ? 'selected="selected"' : '' !!}>
                            Shipped
                        </option>
                        <option {!! $item->order_status == 'Completed' ? 'selected="selected"' : '' !!}>
                            Completed
                        </option>
                        <option {!! $item->order_status == 'Cancel' ? 'selected="selected"' : '' !!}>
                            Cancel
                        </option>
                    </select>
                    <hr>
                    <div class="text-center">
                        <a id="updateOrderStatus" href="javascript:void(0);">
                            <span class="text-center btn btn-success">Update</span>
                        </a>
                    </div>
                </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box -->
     <div class="col-md-9">
        <div class="box box-success">
            <div class="box-body">
                <p class="text-center text-bold"> Order Details </p>
                <div class="table-responsive">
                    <table id="items-table" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                            <th> Name </th>
                            <th> Image </th>
                            <th> Qty </th>
                            <th> Price </th>
                            <th> Sub Total </th>
                            <th> Shipping Date </th>
                        </thead>
                        <tbody>
                            @foreach($item->order_items as $orderItem)
                                <tr>
                                    <td>{{ isset($orderItem->product->title) ? $orderItem->product->title : '' }}</td>
                                    <td>
                                        <img src="{{ URL::to('/').'/uploads/products/'.$orderItem->product->image_1}}" alt="" height="150" width="150">
                                    </td>
                                    <td>{{ $orderItem->qty }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>{{ $orderItem->qty * $orderItem->price }}</td>
                                    <td>
                                        <div class="input-group date">
                                                <select class="form-control"
                                                 id='shipping_status_{!! $orderItem->id !!}'
                                                 name='shipping_status_{!! $orderItem->id !!}'>
                                                    <option {!!$orderItem->shipping_status == 'Pending' ? 'selected="selected"' : '' !!}>Pending</option>
                                                    <option {!!$orderItem->shipping_status == 'In Process' ? 'selected="selected"' : '' !!}>In Process</option>
                                                    <option {!!$orderItem->shipping_status == 'Shipped' ? 'selected="selected"' : '' !!}>Shipped</option>
                                                    <option {!!$orderItem->shipping_status == 'Cancel' ? 'selected="selected"' : '' !!}>Cancel</option>
                                                    <option {!!$orderItem->shipping_status == 'Completed' ? 'selected="selected"' : '' !!}>Completed</option>
                                                </select>
                                                <hr>
                                                {{ Form::text('shipping_date', (isset($orderItem) && isset($orderItem->shipping_date)) ? date('m/d/Y', strtotime($orderItem->shipping_date )) : null, [
                                                    'id' => 'shipping_date_'.$orderItem->id,
                                                    'style' => 'width: 100px;', 'class' => 'form-control datepicker']) }}
                                                <a class="update-shipping-date" href="javascript:void(0);">
                                                    <i data-id="{!! $orderItem->id !!}"
                                                data-item-shipping-status="shipping_status_{!! $orderItem->id !!}"
                                                data-item-value="shipping_date_{!! $orderItem->id !!}" class="fa fa-check-circle fa-2x pull-right"></i>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="text-center"> <strong>Total</strong> </td>
                                <td>{{ $item->order_items->sum('qty') }}</td>
                                <td>-</td>
                                <td>{{ $item->order_total }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <center> <a href="{{ route('admin.orders.index') }}" class="btn btn-primary"> Back </a></center>
            <br>
        </div>
@endsection

@section('after-scripts')
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script type="text/javascript">
    var itemValue, shippingStatus; 

    jQuery(".update-shipping-date").on('click', function(event)
    {
        itemValue = document.getElementById(event.target.getAttribute('data-item-value')).value;
        shippingStatus = document.getElementById(event.target.getAttribute('data-item-shipping-status')).value;
        updateShippingDate(event.target.getAttribute('data-id'), itemValue, shippingStatus);
    });

    jQuery("#updateOrderStatus").on('click', function()
    {
        jQuery.ajax({
            url: '{!! route('admin.orders.update-status') !!}',
            method: 'POST',
            dataType: 'JSON',
            data: {
                itemId:         {!! $item->id !!},
                orderStatus: jQuery("#orderStatus").val()
            },
            success: function(data)
            {
                if(data.status == true)
                {
                    swal("Good job!", data.message, "success");
                }
            },
            error: function(data)
            {

            }
        });
    })

    function updateShippingDate(itemId, shippingDate) 
    {
        jQuery.ajax({
            url: '{!! route('admin.ordersitems.update-shipping-date') !!}',
            method: 'POST',
            dataType: 'JSON',
            data: {
                itemId:         itemId,
                shippingDate:   shippingDate,
                shippingStatus: shippingStatus
            },
            success: function(data)
            {
                if(data.status == true)
                {
                    swal("Good job!", data.message, "success");
                }
            },
            error: function(data)
            {

            }
        });
    }
    
    //Date picker
    jQuery('.datepicker').datepicker(
    {
        format: 'mm/dd/yyyy',
        autoclose: true
    })

</script>
@endsection 