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
        <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><a itemprop="url" href="{!! route('frontend.compliance-testing') !!}"><span itemprop="title">Compliance Testing</span></a></li>
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
    <h3 class="panel-title">EMC Compliance Testing</h3>
  </div>
  <div class="panel-body">
    <p>All electronic devices produce electromagnetic noise, which can potentially cause electromagnetic interference (EMI). Insufficient immunity to noise can affect a product’s ability to work in specific environments, and emanation of noise can potentially interfere with other devices within its environment. This phenomenon is electromagnetic compatibility (EMC).</p>
    <p>Needless to say, testing for EMC is critical when bringing a product to market. For consumer goods, knowing how much noise a device produces and emanates; and how it will respond to noise emanated from an external source is an important part of quality control.</p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Why Perform Compliance Testing In-house?</h3>
  </div>
  <div class="panel-body">
    <p>There are several key benefits to EMC compliance testing of products destined for the consumer marketplace. Of course, meeting your legal and industry-specific requirements is key. Compliance with CISPR 22, EN 61000-3-2, MIL-STD-461 and other EMC standards (for example) is necessary for doing business in many industries and markets.</p>
    <p>Aside from that, however, being vigilant about EMC testing leads to more robust and reliable products. An investment in early testing can help you mitigate risk, eliminate overdesign and create integrated systems that simply work better together.</p>
    <p>Opportunities for EMC compliance testing vary according to where you’re manufacturing and selling your product. For most devices, the CE mark used in Europe is a self-declaration — any organization with the necessary equipment can perform the testing in-house.</p>
    <p>In North America, however, an accredited lab must perform FCC and Industry Canada testing. Even if you don’t plan to go through the accreditation process for your lab, there’s still value to performing EMC pre-compliance testing in your own facility. Approximately half of all consumer products will fail their first EMI test — pre-compliance testing saves you money and helps identify potential issues early in the product development cycle.</p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">EMC Compliance Testing Equipment</h3>
  </div>
  <div class="panel-body">
   <p>You can break EMC compliance testing down into emissions and immunity testing. Emissions testing measures the amount of electromagnetic noise produced by a product or component, whereas immunity testing looks at what happens when a device is exposed to electromagnetic noise and other phenomena from an external source.</p>
   <p>Com-Power is a leading manufacturer of EMC equipment for both types of compliance testing. Our products include tuned antennas for broadband emissions and immunity testing, spectrum analyzers/tracking generators, preamplifiers and power amplifiers, and more.</p>
   <p>We back all of our products with a comprehensive three-year warranty. For organizations newly developing their capacity for in-house pre-compliance EMC testing, we offer convenient packages containing everything you need to get started. Browse <a href="http://www.com-power.com/products.html">current products</a> or <a href="http://www.com-power.com/contact_us.html">contact us today</a> to speak with a representative directly.</p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Equipment Calibration</h3>
  </div>
  <div class="panel-body">
    <p>Only properly calibrated EMC compliance testing equipment can obtain accurate results. We deliver all of our products calibrated to the appropriate standards, with full NIST traceability and documentation included. ISO-accredited calibration service is also available.</p>
    <p>To keep your equipment working its best, our technicians can provide annual re-calibrations as required by various regulatory standards. To maintain accuracy between calibrations, you can use a comb generator for periodic testing of your test site and measurement system.</p>
    <p><a href="http://www.com-power.com/contact_us.html">Contact us today</a> to learn more.</p>
  </div>
</div>
<!-- InstanceEndEditable --> 
</div>
@endsection