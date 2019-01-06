@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Careers<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">Company</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.careers') !!}"><span itemprop="title">Careers</span></a></li>
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
<div class="container container-shade">
<h2>Careers</h2>
<p>
At Com-Power Corporation, we understand the benefit of having people invested in the long term success of the company and we are committed to creating an environment where every person is given the opportunity to succeed through their contributions. Our people support each other to improve our collective capability and achieve excellence in all that we do.
It is our goal to provide the finest products as well as the best support to our customers. We continually improve our products and design new products to help our customers meet their goal. We believe our customer’s success will lead to ours. We look to recruit the best people, who embrace partnership and believe in strong team work – people that are always curious about what customers really need.</p>
<br>
<br>

<h3>Job Opportunities</h3>
<p>
<table class="table table-hover">
<thead>
  <tr>
      <th>Date Posted</th>
        <th>Description</th>
        <th>Location</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
  <tr>
      <td>05/15/2017</td>
        <td><a href="Supply_Chain_Manager.pdf">Supply Chain Manager</a></td>
        <td>Silverado, CA</td>
        <td>Expired 06/16/2017</td>
    </tr>
</tbody>
</table>
</p>
<br>
<br>
<br>
</div>
</div>
 

@endsection