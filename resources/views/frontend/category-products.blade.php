@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Compliance Testing<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">EMC Test Equipment</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.show-category-products', ['slug' => $category->slug]) !!}"><span itemprop="title">{!! $category->title !!}</span></a></li>
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
        <div class="panel panel-default">
            	<div class="panel-body">
                <p>
                	{!! $category->small_description !!}
                </p> 
                <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">Read More</button>

				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  					<div class="modal-dialog modal-lg">
    					<div class="modal-content">
      						<p class="p-modal">
      							{!! $category->description !!}
      							<br /><br />

<a href="{!! route('frontend.contact-us') !!}" class=" btn btn-primary" role="button">Contact Us</a>
<a href="{!! route('frontend.get-a-quote') !!}" class="btn btn-danger pull-left">Get a Quote</a><br /><br />
</p>
    					</div>
 					</div>
				</div>
                </div>
            </div>
        	<div class="row">
        		@if(isset($category->products) && count($category->products))
        			@foreach($category->products as $product)
        				<div class="col-sm-6">
		    				<div class="thumbnail">
		                    <a href="{!! route('frontend.show-product', ['slug' => $product->slug]) !!}">
		                    {!! Html::image('/uploads/products/'.$product->image_1, $product->title) !!}
		                	<br />
		                    {!! $product->title !!} >>
		                    </a>
		                    <div class="caption">
		                    <p>
		                    	{!! $product->description !!}
		                    </p>
		                    </div>
		                    </div>
		                </div>
	                @endforeach
        		@endif
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