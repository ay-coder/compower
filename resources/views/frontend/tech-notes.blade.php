@extends('frontend.layouts.app')

@section('sub-header')
  
  <div class="row headimg">
    <div class="container">
        <div class="col-sm-8">
      <h1><!-- InstanceBeginEditable name="Title" -->Application Notes<!-- InstanceEndEditable --></h1>
          </div>
          <div class="col-sm-4 text-right lev1phone">
          <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
          </div>
          <div class="col-sm-8 visible-lg">
            <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
              <!-- InstanceBeginEditable name="breadcrumbs" -->
            <li>
              <a itemprop="url" href="/">
                <span itemprop="title">EMC Test Equipment</span>
              </a>
            </li>
            <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active">
              <a itemprop="url" href="{!! route('frontend.tech-notes') !!}">
                <span itemprop="title">Application Notes</span>
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
<div class="container container-shade">
<!-- InstanceBeginEditable name="mainbody" -->
<br />
@if(isset($notes) && count($notes))
  @foreach($notes as $note)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
          {!! $note->title !!}
          </h3>
        </div>
        <div class="panel-body">

        @if(isset($note->notes) && count($note->notes))
          @foreach($note->notes as $techNote)
              <li>
                <a href="{!! $techNote->additional_link !!}" target="_blank">
                  {!! $techNote->title !!}
                </a>
              </li>
          @endforeach
        @endif
        </div>
      </div>
  @endforeach
@endif
</div>
@endsection