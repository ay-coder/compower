@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->EMI EMC Test Equipment<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">EMI EMC Test Equipment</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.show-all-category') !!}"><span itemprop="title">Products</span></a></li>
            <!-- InstanceEndEditable -->   
      </ol>
        </div>
        <div class="col-sm-4 text-right">
        <a href="{!! route('frontend.get-a-quote') !!}" class="btn btn-danger pull-right">Get a Quote</a>
        </div>
    </div>
</div>

@stop

@section('content')
 <div class="row rowpad">
</div>
<div class="container container-shade">
<!-- InstanceBeginEditable name="mainbody" -->
<div class="row column-height">
		@if(isset($categories) && count($categories))
			@foreach($categories as $category)
		    	<div class="col-sm-3">
		        	<div class="thumbnail noline">
		            	<a href="{!! route('frontend.show-category-products', ['slug' => $category->slug]) !!}">
		            		{!! Html::image('/uploads/category/'.$category->image, $category->title) !!}
		            	<br />
		            	{!! $category->title !!}
		            	</a>
		            </div>
		        </div>
		    @endforeach
        @endif
        
    </div>
</div>
@endsection