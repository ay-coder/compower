@extends('frontend.layouts.app')

@section('sub-header')
    
<div class="row headimg">
    <div class="container">
        <div class="col-sm-8">
        <h1><!-- InstanceBeginEditable name="Title" -->About Us<!-- InstanceEndEditable --></h1>
        </div>
        <div class="col-sm-4 text-right lev1phone">
        <a href="tel:8553642362"><span style="color: #ffffff">(855) 364-2362</span></a>
        </div>
        <div class="col-sm-8 visible-lg">
            <ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="breadcrumb sm-breadcrumb">
                <li>
                    <a itemprop="url" href="/">
                        <span itemprop="title">EMC Test Equipment</span>
                    </a>
                </li>
                <li itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active">
                    <a itemprop="url" href="{!! route('frontend.about-us') !!}">
                        <span itemprop="title">About Us</span>
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">About Com-Power</h3>
      </div>
      <div class="panel-body">
        Com-Power specializes in the field of Electromagnetic Compatibility commonly referred to as EMC. EMC is explained in more details below; however, in brief, it deals with noise. We make variety of products related to noise; our equipment will help you find, measure and suppress noise in your products. Out test equipment can be used to meet the regulatory requirements for EMC or just to make your products work better. It is our goal to provide the finest products as well as the best support to our customers. We continually improve our products and design new products to help our customers meet their goal. We believe our customer’s success will lead to ours.
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">What is EMC?</h3>
      </div>
      <div class="panel-body">
        EMC stands for Electromagnetic Compatibility, and is the ability of an electronic product to work as intended in its environment. That means the product has to limit its own noise (electromagnetic emissions) so that it does not cause interference to other products. Also, the product has to withstand electromagnetic energy from other products without degradation (EMC immunity) in performance. There are many EMC standards that define the allowable noise levels and required immunity levels.<br />
        We manufacture test equipment to verify emissions as well as noise immunity of products (and systems) in accordance with various Regulatory standards. We also make equipment to identify the causes or sources of disturbances noise. <br />
        There are many reasons for which EMC is traditionally considered difficult to understand. One reason is that the levels of noise as well as the parameters that affect the levels vary over large range. Another reason is that electromagnetic emissions occur as conducted as well as radiated noise. Then the noise can travel as conducted noise, radiated noise and as combination of the two.
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">The history of RFI, EMI and EMC</h3>
      </div>
      <div class="panel-body">
       The world has experienced EMC problems as early as the use of electronics. In Germany, the "Law of Telegraph in the German Empire" was passed in 1892. It dealt with influences of electromagnetic disturbances on products and installations in the field of telegraph use. However, most interference was observed in those days due to radio frequency, hence it was described as RFI. With better understanding, it was realized that interference can occur at any frequency, the term EMI was considered appropriate and was more commonly used. The source of electromagnetic energy was called the “culprit” and the circuit being affected was called “victim” during this time.
    As time passed it was realized that the source of electromagnetic energy may actually be from an important and authorized device like a transmitter. If a circuit gets affected, it may have to be redesigned to operate reliably in the presence of the electromagnetic energy. Some sources and affected circuits may even be parts of the same device (or system). In other words, the idea became acceptable that there is no culprit or victim circuit. All electronics have to function reliably in their intended environment without degradation in performance. In addition, they have to minimize the emission so as not to cause harmful interference to other electronics in their vicinity. The term Electromagnetic Compatibility or EMC describes this situation.
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">EMC in the past</h3>
      </div>
      <div class="panel-body">
        Most situations of interference in the earlier years were not critical or life threatening. However, during the war (in 1940s), electronic equipment onboard naval ships increased greatly. The electronics included, among other things, powerful transmitters as well as sensitive receivers.  Quite often the electronics equipment was confined to small areas and was used in close proximity. While critical incidents of interference increased significantly, it also increased awareness of EMC and major advances were also made in the design for EMC. FCC which is based on the European Directive.
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">EMC is important aspect of product reliability</h3>
      </div>
      <div class="panel-body">
        The performance of an electrical product can be affected seriously unless EMC is taken into account. This is true for common products such as radios, televisions, computers, telephones, washing machines, etc., but it is also for the electronics in complex products like autos, aircraft, ships and large industrial machines. These are very sensitive to EMC problems and no one wants to accept serious disturbances within a big chemical plant. We know these issues will support you so that you better understand them. Many are described in the App Notes. However, we welcome your questions, pecially related to EMC testing. Let's keep in contact. Reaching our web site you have completed the first step.
      </div>
    </div>
    <!-- InstanceEndEditable --> 
    </div>
@endsection