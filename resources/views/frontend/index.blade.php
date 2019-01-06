@extends('frontend.layouts.app')

@section('sub-header')
    
<div class="tophead">
    <div class="container text-right lev1phone">
        (855) 364-2362
    </div>
</div>

@stop

@section('above-container')

<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
            @if(isset($banners) && count($banners))
                @foreach($banners as $banner)
                    <li>
                        <a href="{!! route('frontend.show-category-products', ['slug' => isset($banner->category) ? $banner->category->slug : '']) !!}">
                            {!! Html::image('/uploads/banner/'.$banner->image, $banner->title, ['title'  => $banner->title, 'id' => 'wows1_'.$banner->id]) !!}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="ws_bullets">
        <div>
        @if(isset($banners) && count($banners))
            @foreach($banners as $banner)
                <a href="#" title="{!! $banner->title !!}">
                {!! Html::image('/uploads/banner/'.$banner->image, $banner->title, ['width' => 224, 'height' => 48]) !!}
                {{ $banner->id }}
                </a>
            @endforeach
        @endif
        </div>
    </div>

    <div class="ws_shadow"></div>
    </div>
@stop
@section('content')
    <!-- InstanceEndEditable -->
    <div class="row">
            <div class="row-fluid rowpad">
                <div class="col-sm-4">
                    @php
                        $aboutUs = access()->getPage('about-us');
                    @endphp
                    <div class="blockcol">
                    <div class="text-center">
                    <a href="{!! route('frontend.about-us') !!}">
                        <i class="{!! isset($aboutUs) && isset($aboutUs->icon) ? $aboutUs->icon : ''  !!}"></i>
                    </a>
                    </div>
                    <div class="thumbnail">
                        <a href="{!! route('frontend.about-us') !!}">
                            @if($aboutUs->image)
                                {!! Html::image('/uploads/pages/'.$aboutUs->image, $aboutUs->title) !!}
                            @endif
                        </a>
                    </div>
                    <h3>{!! isset($aboutUs) && isset($aboutUs->title) ? $aboutUs->title: 'About Com-Power Corp' !!}</h3>
                    <p>
                        {!! isset($aboutUs) && isset($aboutUs->short_description) ? $aboutUs->short_description: '' !!}
                    </p>
                    <a href="{!! route('frontend.about-us') !!}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="blockcol">
                <div class="text-center">
                    <a href="javascript:void(0);"><i class="fa fa-book fa-3x lblue padbottom10"></i></a>
                    </div>
                    <div class="thumbnail"><a href="products.html"><img src="images/ACS-230-25W.png" alt="Products"></a></div>
                    <h3>EMC Test Equipment</h3>
                    <p>Com-Power product line includes solutions for EMC emissions and immunity testing to meet various global EMC test standards. Our products can be used for both preliminary and final compliance testing. The product line consist of broadband antennas, <a href="http://com-power.com/preamplifiers.html">preamplifiers</a>, <a href="http://com-power.com/power_amplifiers.html">power amplifiers</a>, <a href="http://com-power.com/lisns.html">LISNs</a>, <a href="http://www.com-power.com/cdns.html">CDNs</a>, <a href="http://com-power.com/comb_generators.html">Comb Generators</a>, <a href="http://com-power.com/near_field_probes.html">Near Field Probes</a> and much more. We take pride in our customer service, EMC testing expertise and quick delivery. In addition, we offer three year warranty.</p>
                    <a href="{!! route('frontend.show-all-category') !!}" class="btn btn-primary">Browse Products</a>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="blockcol">
                <div class="text-center">
                    <a href="{!! route('frontend.contact-us') !!}"><i class="fa fa-phone-square fa-3x lblue padbottom10"></i></a>
                    </div>
                <div class="thumbnail"><a href="{!! route('frontend.contact-us') !!}"><img src="images/sameship.png"></a></div>
                <h3>Contact Us</h3>
                <p>Com-Power offers direct sales and a network of representatives and distributors both local and worldwide to serve your needs.<br />
                  <h5>Sales:</h5>
                    <strong>Toll Free: (855) EMI-2-EMC (364-2362)</strong><br /><br />
                    <strong>Telephone: (949) 459-9600</strong><br /><br/>
                    <strong>Email: <a href="mailto:sales@com-power.com">sales@com-power.com</a></strong>
        </p>
                <a href="{!! route('frontend.contact-us') !!}" class="btn btn-primary">More Info</a>
                <a href="{!! route('frontend.get-a-quote') !!}" class="btn btn-danger pull-right">Get a Quote</a>
                </div>
                </div>

            </div>

    </div><!--row-->
@endsection
@section('wow-scripts')
<script type="text/javascript" src="{!! asset('engine1/wowslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('engine1/script.js') !!}"></script>
@endsection