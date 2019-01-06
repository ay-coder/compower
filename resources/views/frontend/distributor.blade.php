@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Distributors<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">EMC Test Equipment</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.distributors') !!}"><span itemprop="title">Distributors</span></a></li>
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
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  @if(isset($countries) && count($countries))
    @foreach($countries as $country)

          @if(isset($country->distributors) && count($country->distributors))

          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-{!! $country->id !!}" aria-expanded="true" aria-controls="collapseOne">
                  {!! $country->title !!}
                </a>
              </h4>
            </div>
            <div id="collapse-{!! $country->id !!}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                @foreach($country->distributors as $distributor)
                    <strong>{!! $distributor->title !!}</strong>
                    <br />
                    Contact: {!! $distributor->contact !!}<br />
                    {!! $distributor->address_line_one !!}
                    {!! $distributor->address_line_two !!}
                    <br />
                    {!! $distributor->city !!}, {!! $distributor->state !!}, {!! $distributor->zip !!} {!! $distributor->country!!}<br />
                    Phone: {!! $distributor->phone !!} 
                  
                    @if(isset($distributor->fax))
                      Fax : {!! $distributor->fax !!}
                    @endif
                    <br />
                    
                    @if(isset($distributor->email))
                    Email: <a href="mailto:{!! $distributor->email !!}" target="new">
                    {!! $distributor->email !!}</a>
                    <br>
                    @endif

                    @if(isset($distributor->website))
                    Website: <a href="{!! $distributor->website !!}" target="new">
                    {!! $distributor->website !!}</a>
                    <br>
                    @endif

                    @if(isset($distributor->skype))
                    Skype:{!! $distributor->skype !!}
                    <br>
                    @endif

                @endforeach
              </div>
            </div>
          </div>

          @endif
    @endforeach
  @endif
  
<!-- InstanceEndEditable --> 
</div>
</div>
@endsection