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
                                    <td>{{ $orderItem->product->title }}</td>
                                    <td>
                                        <img src="{{ URL::to('/').'/uploads/products/'.$orderItem->product->image_1}}" alt="" height="150" width="150">
                                    </td>
                                    <td>{{ $orderItem->qty }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>{{ $orderItem->qty * $orderItem->price }}</td>
                                    <td>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                                {{ Form::text('shipping_date', (isset($item) && isset($orderItem->shipping_date)) ? date('m/d/Y', strtotime($orderItem->shipping_date )) : null, ['style' => 'width: 120px;', 'class' => 'form-control datepicker']) }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="text-center"> <strong>Total</strong> </td>
                                <td>{{ $item->order_items->sum('qty') }}</td>
                                <td>-</td>
                                <td>{{ $item->order_total }}</td>
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
    
    //Date picker
    jQuery('.datepicker').datepicker(
    {
        format: 'mm/dd/yyyy',
        autoclose: true
    })

</script>
@endsection 