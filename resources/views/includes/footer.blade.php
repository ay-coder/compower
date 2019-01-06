
<div class="row">
	<div class="col-sm-12">
    	<div class="prefooter">
        	<div class="container">
            	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="6500">
  					<!-- Wrapper for slides -->
  					<div class="carousel-inner" role="listbox">
                        @php
                            $testimonials = access()->getTestimonials();
                        @endphp
                        
                        @if(isset($testimonials) && count($testimonials))
                            @foreach($testimonials as $testimonial)
                                <div class="item {!! $loop->first ? 'active' : '' !!}">
                                    <a href="javascript:void(0);">
                                    <p class="white-text-banner-sm">
                                    <i class="fa fa-quote-left fa-fw lblue">
                                        
                                    </i>
                                        {!! $testimonial->description !!}
                                    <i class="fa fa-quote-right fa-fw lblue"></i>
                                    </p>
                                    <p class="text-center lblue">
                                    - {!! $testimonial->company !!}
                                    </p></a>
                                </div>
                            @endforeach
                        @endif
                     </div>
			</div>
            	
                
                
            </div>
        </div>
    </div>
</div>

<footer>
<div class="nav navbar-inverse navbar-bottom" role="navigation">
	<div class="container visible-lg">
    	<div class="nav navbar-nav navbar-left text-sm">
        	<ul class="nav navbar-nav">
            	<li><a href="ordering.html">Ordering Instructions</a></li>
            	<li><a href="warranty.html">Warranty</a></li>
                <li><a href="links_industry.html">Industry Links</a></li>
                <li><a href="{!! route('frontend.blog') !!}">Blog</a></li>
           </ul>
        </div>
    	<div class="nav navbar-nav navbar-right text-sm">
        	<ul class="nav navbar-nav">
            	<li><a href="{!! route('frontend.contact-us') !!}">Contact Us</a></li>
            	<li><a href="{!! route('frontend.distributors') !!}">Distributors</a></li>
           		<li><a href="{!! route('frontend.about-us') !!}">About Us</a></li>
                <li><a href="{!! route('frontend.get-a-quote') !!}">Catalog</a></li>
                <li><a href="{!! route('frontend.get-a-quote') !!}">Quote</a></li>
                <li><a href="{!! route('frontend.tech-notes') !!}">Tech Notes</a></li>                
                <li><a href="sitemap.html">Sitemap</a></li>
           </ul>
        </div>
    </div>
    <div class="container">
    	<div class="foot-last">
			<div itemscope itemtype="http://schema.org/ElectronicsStore">
			<link itemprop="additionalType" href="http://www.productontology.org/id/Electromagnetic_compatibility" />
            </div>
			<div itemscope itemtype="http://schema.org/PostalAddress">
			&#169; <span itemprop="name">Com-Power Corporation</span> - Supplier of Standard-Compliant EMI EMC Test Equipment<br />
			<span itemprop="streetAddress">114 Olinda Drive</span>,&nbsp;
			<span itemprop="addressLocality">Brea</span>,&nbsp;
			<span itemprop="addressRegion">CA</span>nbsp;
			<span itemprop="postalCode">92823</span>&nbsp;-&nbsp;Tel: <span itemprop="telephone">(949) 459-9600</span>
			</div>
        </div>
        
    </div>
</div>

</footer>

<script src="//cdn.leadmanagerfx.com/js/mcfx/784" type="text/javascript"></script>

</body>
<!-- InstanceEnd --></html>
