@extends('frontend.layouts.app')

@section('sub-header')
   <div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Get A Quote<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li><a itemprop="url" href="/"><span itemprop="title">Compower</span></a></li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.get-a-quote') !!}"><span itemprop="title">Get A Quote</span></a></li>
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
<script language="javascript">
function chkform(frm)
{
	 if(document.frm.cname.value=="")
	{
		alert ("Please enter Company Name");
		document.frm.cname.focus();
		return (false);
	}
	else if(document.frm.cperson.value=="")
	{
		alert ("Please enter  Contact Person Name");
		document.frm.cperson.focus();
		return (false);
	}
	else if(document.frm.phone.value=="")
	{
		alert ("Please enter Phone Number");
		document.frm.phone.focus();
		return (false);
	}
	else if(document.frm.email.value=="" || document.frm.email.value.indexOf("@",0) == -1 || document.frm.email.value.indexOf(".",0) == -1)
	{
		alert ("Please enter valid Email Address");
		document.frm.email.focus();
		return (false);
	}
	else if(document.frm.badd.value=="")
	{
		alert ("Please enter Address");
		document.frm.badd.focus();
		return (false);
	}
	else if(document.frm.bcity.value=="")
	{
		alert ("Please enter City");
		document.frm.bcity.focus();
		return (false);
	}
	else if(document.frm.bstate.value=="")
	{
		alert ("Please enter State");
		document.frm.bstate.focus();
		return (false);
	}
}
</script>
<br />

<form name="frm" method="get" id="quote-request" action="{!! route('frontend.quote-request') !!}" onSubmit="javascript: return chkform(this);">
<div class="form-group col-sm-4">
  <label for="cname" >Company Name</label>
  {!! Form::text('cname', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Company Name', 'required' ]) !!}
</div>
<div class="form-group  col-sm-4">
  <label for="cperson" >Contact Person</label>
  
  {!! Form::text('cperson', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Contact Person', 'required' ]) !!}
</div>
<div class="form-group  col-sm-4">
  <label for="itle" >Job Title</label>

  {!! Form::text('title', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Title', 'required' ]) !!}
</div>
<div class="form-group col-sm-4">
  <label for="phone" >Phone Number</label>

  {!! Form::text('phone', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Phone' ]) !!}
</div>
<div class="form-group col-sm-4">
  <label for="email" >E-mail Address</label>

  {!! Form::email('email', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Email']) !!}
</div>
<div class="form-group col-sm-4">
  
    <label for="phrase" >Search Engine Phrase Used (if remembered)</label>
  	
  	 {!! Form::text('phrase', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'e.g. Comb Generators' ]) !!}
</div>
<div class="form-group col-sm-12">
  <label for="badd" >Address</label>

   {!! Form::text('badd', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Address' ]) !!}
</div>
<div class="form-group  col-sm-4">
  <label for="bcity" >City</label>

     {!! Form::text('bcity', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'City' ]) !!}
</div>
<div class="form-group col-sm-4">
  <label for="bstate" >State</label>

  {!! Form::text('bstate', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'State' ]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="bzip" >Zip Code</label>
  {!! Form::text('bzip', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Zip' ]) !!}
</div>
<div class="form-group col-sm-12">
  <label for="bcountry" >Country</label>

    {!! Form::text('bcountry', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Country' ]) !!}
</div>
<div>
<h3>Product Quotes</h3>
</div>
@php
for($i = 1; $i < 6; $i++)
{
@endphp

<div>
	<div class="form-group col-sm-4">
	  <label for="p{!! $i !!}" >Product {!! $i !!}</label>
	  {!! Form::text('p'. $i, null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Product '.$i ]) !!}
	</div>

	<div class="form-group col-sm-4">
		<label for="q{!! $i !!}" >Quantity</label>
	  	{!! Form::text('q'.$i, null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'Quantity '.$i, 'size' => 10 ]) !!}
	</div>

	<div class="form-group col-sm-4">
  		<label for="r{!! $i !!}"  >Required</label>
  		{!! Form::select('r'.$i, [
	  	'' 				=>"Please Specify", 
	  	'Immediately' 	=>"Immediately", 
	  	'In a week' 	=>"In a week", 
	  	'In a month' 	=>"In a month", 
	  	'In six months' =>"In six months", 
	  ], null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2"]) !!}
	</div>
</div>


@php
}
@endphp

<div class="form-group">
  <label for="addreq" >Additional Requirements</label>
  {!! form::textarea('addreq', null, [ "class" => "form-control", "aria-describedby" => "sizing-addon2", "name" => "addreq", "cols" => "50", "rows" => "5"  ]) !!}
</div>
<div class="form-group">
  <label for="pcode" >Enter promotional code for discounts:</label>
  {!! Form::text('pcode', null, ['class' => 'form-control', 'aria-describedby' => "sizing-addon2", 'placeholder' => 'pcode' ]) !!}
</div>

<div class="form-group">

<input class="btn btn-default" type="submit" name="Submit" value="Submit">
&nbsp;&nbsp;
<input class="btn btn-default" type="reset" name="Submit2" value="Reset">
</div>
</form>

  <!-- InstanceEndEditable --> 
</div>
  
@endsection