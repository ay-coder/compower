@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->{!! $product->category->title !!}<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">{!! $product->category->title !!}</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.show-product', ['slug' => $product->slug]) !!}"><span itemprop="title">{!! $product->title !!}</span></a></li>
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
<div class="rowpad">
</div>
	<div class="row">
		<div class="col-sm-9">
        	<div class="row">
            	<div class="col-sm-6 level4-col">
    				<div class="thumbnail level4-thumb">
					{!! Html::image('/uploads/products/'.$product->image_1, $product->title) !!}
					</div>
                </div>
    			<div class="col-sm-6">    
        			<div class="panel panel-default">
  						<div class="panel-heading">
   							<h3 class="panel-title">
   								{!! $product->title !!}
   							</h3>
 						</div>
  						<div class="panel-body">
                      		{!! $product->description !!}
                      		<div class="pull-right">
                      		@if(isset(access()->user()->id))
                      			<a data-id="{!! $product->id !!}" href="javascript:void(0);" class="btn btn-primary add-item-to-cart">
                      				Add to Cart
                      			</a>
                      		@else
                      			<a  href="{!! route('frontend.login') !!}" class="btn btn-primary">
                      				Click Here To Login 
                      			</a>
                      		@endif
                      		</div>
                        </div>
					</div>
    			</div>
            </div>
            <div class="row">
            	<div class="bs-docs-example">
    				<ul id="lev4tab" class="nav nav-tabs">
 						<li role="presentation" class="active"><a href="#features" data-toggle="tab">Features</a></li>
  						<li role="presentation"><a href="#specs"  data-toggle="tab">Specifications</a></li>
  						<li role="presentation"><a href="#charts" data-toggle="tab">Charts</a></li>
                        <li role="presentation"><a href="#docs" data-toggle="tab">Documentation</a></li>
                        <li id="getq"><a href="{!! route('frontend.get-a-quote') !!}">Get a Quote</a></li>
					</ul>
    			</div>         
            </div>
            <div class="col-sm-12">
            	<div id="lev4tabCont" class="tab-content">
            		
                    <div class="tab-pane fade in active" id="features">
                	<p>{!! $product->features !!}</p>
                    </div>
                    <div class="tab-pane fade" id="specs">
                    <p>{!! $product->specifications !!}</p>
                    </div>
                    <div class="tab-pane fade" id="charts">
                    <p>
                    @if(isset($product->chart_1))
                    	{!! Html::image('/uploads/charts/'.$product->chart_1, $product->title, ['class' => 'img-responsive']) !!}
                    @endif

                    @if(isset($product->chart_2))
                    		{!! Html::image('/uploads/charts/'.$product->chart_2, $product->title, ['class' => 'img-responsive']) !!}
                    @endif

                    @if(isset($product->chart_3))
                    		{!! Html::image('/uploads/charts/'.$product->chart_3, $product->title, ['class' => 'img-responsive']) !!}
                    @endif
                    </p>
                    </div>
                     <div class="tab-pane fade" id="docs">
                    <p><!-- InstanceBeginEditable name="Documentation" -->
                    <div class="col-sm-12">

                    	@if(isset($product->pdf_1))
	                    	<a target="_blank" class="pdf" href="{{ url('/uploads/pdf/'.$product->pdf_1) }}">
	                    	    {!! $product->pdf_title_1 !!}
	                    	</a>
                    	@endif

                    	@if(isset($product->pdf_2))
                    	<a target="_blank" class="pdf" href="{{ url('/uploads/pdf/'.$product->pdf_2) }}">
                    	    {!! $product->pdf_title_2 !!}
                    	</a>
                    	@endif

                    	@if(isset($product->pdf_3))
                    	<a target="_blank" class="pdf" href="{{ url('/uploads/pdf/'.$product->pdf_3) }}">
                    	    {!! $product->pdf_title_3 !!}
                    	</a>
                    	@endif
                    
					</div>
					</p>
                    </div>    <br />                
           	  </div>
            </div>
            
        </div>
        
   		<div class="col-sm-3 visible-lg">
     		<div class="panel panel-default">
  				<div class="panel-heading">
   					<h3 class="panel-title">Other EMC Test Equipment</h3>
 				</div>
  				<div class="panel-body">
                	<ul>
                       <li><a href='antennas.html'><span>Antennas</span></a></li>
                       <li><a href='antenna_kits.html'><span>Antenna Kits</span></a></li>
                       <li><a href='absorbing_clamps.html'><span>Absorbing Clamps</span></a></li>
                       <li><a href='cdns.html'><span>CDNs</span></a></li>
                       <li><a href='comb_generators.html'><span>Comb Generators</span></a></li>
                       <li><a href='current_probes.html'><span>Current Probes</span></a></li>
                       <li><a href='test_system.html'><span>Emissions System</span></a></li>
                       <li><a href='test_system_conducted_immunity.html'><span>Immunity System</span></a></li>
                       <li><a href='isn.html'><span>ISNs</span></a></li>
                       <li><a href='lisns.html'><span>LISNs</span></a></li>
                       <li><a href='magneticfieldgen.html'><span>Magnetic Field Generator</span></a></li>
                       <li><a href='masts.html'><span>Masts</span></a></li>
                       <li><a href='near_field_probes.html'><span>Near Field Probes</span></a></li>
                       <li><a href='preamplifiers.html'><span>Preamplifiers</span></a></li>
                       <li><a href='power_amplifiers.html'><span>Power Amplifiers</span></a></li>
                       <li><a href='safety.html'><span>Safety</span></a></li>
                       <li><a href='spectrum_analyzer.html'><span>Spectrum Analyzers</span></a></li>
                       <li><a href='surgen.html'><span>Surge Generators</span></a></li>
                       <li><a href='transient_limiters.html'><span>Transient Limiters</span></a></li>
                       <li><a href='turntables.html'><span>Turntables</span></a></li>
                       <li><a href='tripods.html'><span>Tripods</span></a></li>
                       <li><a href='Part68Test%20Equipment.html'><span>Telecom Test System</span></a></li>
                       <li><a href='telecom_analyzer.html'><span>Telecom Analyzer</span></a></li>
                 	</ul>             	
  				</div>
	 		</div>
    	</div>
	</div>
</div>
@endsection

@section('after-scripts')
  <script type="text/javascript">
    var moduleConfig = {
        deleteCartItemUrl: '{!! route('frontend.remove-cart-product') !!}'
    };
    jQuery(document).ready(function()
    {
        bindAddProduct();
    });

    function bindAddProduct()
    {
        jQuery('.add-item-to-cart').on('click', function(e)
        {
        	var productId 	= jQuery(e.target).attr('data-id'),
        		params 		= {
        		'productId' : productId
        	};

            jQuery.ajax(
              {
                url:  '{!! route('frontend.add-cart-product') !!}',
                type: 'POST',
                dataType: 'JSON',
                data: params,
                success: function(data)
                {
                    if(data.status == true)
                    {
                    	toastr.success('Product added to Cart Successfully!');
                    }
                    else
                    {
                    	toastr.error('Product Already added to Cart!');	
                    }
                },
                error: function(data)
                {

                }
              });
        });
    }
</script>
@endsection