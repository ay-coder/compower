@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Contact Us<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">EMC Test Equipment</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.contact-us') !!}"><span itemprop="title">Contact Us</span></a></li>
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
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Corporate Office</h3>
  </div>
  <div class="panel-body">
114 Olinda Drive<br />
Brea, California 92823<br />
USA<br /><br />

Tel: (714) 528-8800<br />
Fax: (714) 528-1992<br /><br />

Hour: 8 AM - 5 PM PST
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sales and Customer Support</h3>
  </div>
  <div class="panel-body">
19121 El Toro Road<br />
Silverado, California 92676<br />
USA<br /><br />

Tel: (949) 459-9600<br />
Fax: (949) 635-0329<br /><br />

Email: sales@com-power.com<br /><br />

Hours: 8:30 AM - 5:30 PM PST<br />
  </div>
</div>
<!-- InstanceEndEditable --> 
</div>
  
@endsection