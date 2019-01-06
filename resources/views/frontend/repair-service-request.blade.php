@extends('frontend.layouts.app')

@section('sub-header')
    
<div class="row headimg">
  <div class="container">
      <div class="col-sm-8">
    <h1><!-- InstanceBeginEditable name="Title" -->Service Request<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
          <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
            <!-- InstanceBeginEditable name="breadcrumbs" -->
          <li>
            <a itemprop="url" href="/">
              <span itemprop="title">
                EMC Test Equipment
              </span>
            </a>
          </li>
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active">
          <a itemprop="url" href="{!! route('frontend.repair-service-request') !!}">
            <span itemprop="title">
              Repair Service Request
            </span>
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
}
function funadd()
{
document.frm.sadd.value=document.frm.badd.value
document.frm.scity.value=document.frm.bcity.value
document.frm.sstate.value=document.frm.bstate.value
document.frm.szip.value=document.frm.bzip.value
document.frm.scountry.value=document.frm.bcountry.value
}
</script>
<br />

<form name="frm" method="post" id="repair-form" action="#" onSubmit="javascript: return chkform(this);">
<div class="form-group col-sm-12">
  <label for="cname" >Company Name</label>
  {!! Form::text('cname', null, ['class' => "form-control", 'placeholder' => 'Company Name', 'aria-describedby' => "sizing-addon2", 'id' => "cname"]) !!}
</div>
<div class="form-group  col-sm-12">
  <label for="cperson" >Contact Person</label>
  {!! Form::text('cperson', null, ['class' => "form-control",  'placeholder' => 'Contact Person', 'aria-describedby' => "sizing-addon2", 'id' => "cperson"]) !!}
</div>

<div class="form-group  col-sm-12">
  <label for="itle" >Job Title</label>
   {!! Form::text('title', null, ['class' => "form-control", 'placeholder' => 'Title', 'aria-describedby' => "sizing-addon2", 'id' => "title"]) !!}
</div>

<div class="form-group col-sm-6">
  <label for="phone" >Phone Number</label>
  {!! Form::text('phone', null, ['class' => "form-control", 'placeholder' => 'Phone', 'aria-describedby' => "sizing-addon2", 'id' => "phone"]) !!}
</div>

<div class="form-group col-sm-6">
  <label for="email" >E-mail Address</label>
  {!! Form::email('email', null, ['class' => "form-control", 'placeholder' => 'Email', 'aria-describedby' => "sizing-addon2", 'id' => "email"]) !!}
</div>
<div class="form-group col-sm-12">
  <label for="badd" >Address</label>
    {!! Form::text('badd', null, ['class' => "form-control", 'placeholder' => 'Address', 'aria-describedby' => "sizing-addon2", 'id' => "badd"]) !!}
</div>

<div class="form-group  col-sm-4">
  <label for="bcity" >City</label>
  {!! Form::text('bcity', null, ['class' => "form-control", 'placeholder' => 'City', 'aria-describedby' => "sizing-addon2", 'id' => "bcity"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="bstate" >State</label>
  {!! Form::text('bstate', null, ['class' => "form-control", 'placeholder' => 'City', 'aria-describedby' => "sizing-addon2", 'id' => "bstate"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="bzip" >Zip Code</label>
  {!! Form::text('bzip', null, ['class' => "form-control", 'placeholder' => 'Zip', 'aria-describedby' => "sizing-addon2", 'id' => "bzip"]) !!}
</div>

<div class="form-group col-sm-12">
  <label for="bcountry" >Country</label>
  {!! Form::text('bcountry', null, ['class' => "form-control", 'placeholder' => 'Country', 'aria-describedby' => "sizing-addon2", 'id' => "bcountry"]) !!}
</div>

<div class="form-group col-sm-12">
  <label for="bcountry" >Shipping Address</label>
  <input class="btn btn-default btn-sm"  type="button" name="Submit3" value="Same As Above" onClick="funadd()">
</div>

<div class="form-group col-sm-12">
  <label for="sadd" >Address</label>
  {!! Form::text('sadd', null, ['class' => "form-control", 'placeholder' => 'Address', 'aria-describedby' => "sizing-addon2", 'id' => "sadd"]) !!}
</div>

<div class="form-group  col-sm-4">
  <label for="scity" >City</label>
  {!! Form::text('scity', null, ['class' => "form-control", 'placeholder' => 'City', 'aria-describedby' => "sizing-addon2", 'id' => "scity"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="sstate" >State</label>
    {!! Form::text('sstate', null, ['class' => "form-control", 'placeholder' => 'State', 'aria-describedby' => "sizing-addon2", 'id' => "sstate"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="szip" >Zip Code</label>
  {!! Form::text('szip', null, ['class' => "form-control", 'placeholder' => 'Zip', 'aria-describedby' => "sizing-addon2", 'id' => "szip"]) !!}
</div>

<div class="form-group col-sm-12">
  <label for="scountry" >Country</label>
  {!! Form::text('scountry', null, ['class' => "form-control", 'placeholder' => 'Country', 'aria-describedby' => "sizing-addon2", 'id' => "scountry"]) !!}
</div>

<div class="form-group col-sm-12">
<h3>REPAIR REQUEST</h3>
</div>
<div class="form-group col-sm-6">
  <label for="modelno" >Product Model Number</label>
    {!! Form::text('modelno', null, ['class' => "form-control", 'placeholder' => 'Contact Number', 'aria-describedby' => "sizing-addon2", 'id' => "modelno"]) !!}
</div>

<div class="form-group col-sm-6">
  <label for="serialno" >Product Serial Number</label>
      {!! Form::text('serialno', null, ['class' => "form-control", 'placeholder' => 'Serial Number', 'aria-describedby' => "sizing-addon2", 'id' => "serialno"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="smethod" >Shipping Method</label>
  {!! Form::select('smethod', [
      ''                => 'Please Select',
      'Prepay and add'  => 'Prepay and add',
      'Collect'         => 'Collect'
  ], null, ['class' => "form-control",  'aria-describedby' => "sizing-addon2", 'id' => "smethod"]) !!}
</div>

<div class="form-group col-sm-4">
  <label for="shipname" >Shipper  Name</label>
  {!! Form::text('shipname', null, ['class' => "form-control", 'placeholder' => 'Shipper Name', 'aria-describedby' => "sizing-addon2", 'id' => "shipname"]) !!}
</div>
<div class="form-group col-sm-4">
  <label for="sacno" >Shipper Account Number</label>
  {!! Form::text('sacno', null, ['class' => "form-control", 'placeholder' => 'Shipper Account Number', 'aria-describedby' => "sizing-addon2", 'id' => "sacno"]) !!}
</div>

<div class="form-group col-sm-12">
  <label for="probdesc" >Description of Problem</label>
  {!! Form::textarea('probdesc', null, ['cols' => "50", 'rows' => "4", 'class' => "form-control", 'aria-describedby' => "sizing-addon2", 'id' => "probdesc"]) !!}
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