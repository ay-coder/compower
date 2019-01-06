
<!DOCTYPE>
<html  lang="{{ config('app.locale') }}">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="@yield('meta_description', 'Application')">
<meta name="author" content="@yield('meta_author', 'Application')">

@yield('meta')

<!-- InstanceBeginEditable name="doctitle" -->
<title>@yield('title', app_name())</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!--<meta name="google-site-verification" content="3g0aQ-t0bbCOgWyzpzr3wKW6JOXtpBBkzUzqDtj3ytI" />-->
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />
<meta HTTP-EQUIV="DISTRIBUTION" CONTENT="GLOBAL" />
<meta HTTP-EQUIV="RESOURCE TYPE" CONTENT="EMI Test equipment product listing" />
<meta NAME="ROBOTS" CONTENT="index, follow, all" />
<meta NAME="revisit-after" CONTENT="30 days" />
<meta NAME="classification" CONTENT="Commercial" />
<meta NAME="rating" CONTENT="General" />
<meta HTTP-EQUIV="content-language" CONTENT="en-us" />
<meta NAME="Author" CONTENT="mailto:tmiranda@com-power.com" />
<meta NAME="Classification" CONTENT="Commercial" />
<meta NAME="Description"CONTENT="Com-Power is a leading supplier for EMC test equipment and EMI test equipment. Learn more about Com-Power's EMC test equipment today!"/>
<link href="{{ asset('engine1/style.css') }}" rel="stylesheet">

<script type="text/javascript" src="{!! asset('engine1/jquery.js') !!}"></script>
<!-- InstanceEndEditable -->


<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@yield('before-styles')
@yield('after-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{-- @langRTL
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endif --}}

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "http://com-power.com/",
            "logo": "http://com-power.com/images/logo.png",
            "legalName": "Com-Power Corporation",
            "alternateName": "Com-Power",
            "sameAs": [ 
            "https://www.linkedin.com/company/com-power-corporation"]
          }
            "contactPoint" : [{
              "@type" : "ContactPoint",
              "telephone" : "+1-855-364-2362",
              "contactType" : "customer service"
            }]
            }</script>
        <script type="application/ld+json">
        { "@context": "http://schema.org",
          "@type": "Service",
          "name": ["EMC Test Equipment", "EMI Test Equipment", "EMC Testing", "Electromagnetic Compatibility Testing", "Electromagnetic Interference Testing"]
        }
        </script>

    </head>
    <body id="app-layout">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
            
            @yield('sub-header')

            @yield('above-container')
            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!--#app-->

        @include('includes.footer')

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        @yield('after-scripts')
        <script type="text/javascript" src="{!! asset('js/custom/custom.js') !!}"></script>

        @yield('wow-scripts')

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        @include('includes.partials.ga')

        <script type="text/javascript">
            $(document).ready(function () {
                   $('.dropdown-toggle').dropdown();
               });
        </script>
    </body>
</html>