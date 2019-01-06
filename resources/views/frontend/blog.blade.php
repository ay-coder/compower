@extends('frontend.layouts.app')

@section('sub-header')
  
  <div class="row headimg">
    <div class="container">
        <div class="col-sm-8">
      <h1><!-- InstanceBeginEditable name="Title" -->Blog<!-- InstanceEndEditable --></h1>
          </div>
          <div class="col-sm-4 text-right lev1phone">
          <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
          </div>
          <div class="col-sm-8 visible-lg">
            <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
              <!-- InstanceBeginEditable name="breadcrumbs" -->
            <li>
              <a itemprop="url" href="/">
                <span itemprop="title">Blog</span>
              </a>
            </li>
            <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active">
              <a itemprop="url" href="{!! route('frontend.blog') !!}">
                <span itemprop="title">Blog</span>
              </a>
            </li>
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

@if(isset($blogs) && count($blogs))
    @foreach($blogs as $blog) 
          <div class="container container-shade"><br />
                  <div class="panel panel-default">
                          <div class="panel-body">
                              <h2>{!! $blog->title !!}</h2>
                              <p>
                              {!! $blog->description !!}
                              </p>
          <a href="{!! $blog->additional_link !!}" button type="button" class="btn btn-default btn-xs pull-right">
            {!! $blog->btntext !!}
          </a></button>
          </div>
          </div>
          </div>
    @endforeach
@endif
    
@endsection