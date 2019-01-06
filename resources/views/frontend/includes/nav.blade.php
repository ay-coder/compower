<nav class="navbar navbar-default  navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{!! route('frontend.index') !!}">
                {!! Html::image('/uploads/media/logo.png', 'EMC Testing Equipment by Com-Power Corporation', ['width'=> '201', 'height' => '43']) !!}
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Products
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    @php
                        $categories = access()->getAllCategories();
                    @endphp

                    @if(isset($categories) && count($categories))
                        @foreach($categories as $category)
                            <li>
                                <a href="{!! route('frontend.show-category-products', ['slug' => $category->slug]) !!}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Sales
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{!! route('frontend.get-a-quote') !!}">
                            Request Quote
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('frontend.distributors') !!}">
                            Distributors
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Service
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:void(0);">
                            Test Service
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{!! route('frontend.tech-notes') !!}">
                    Tech Notes
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Company
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{!! route('frontend.about-us') !!}">
                            About US
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('frontend.compliance-testing') !!}">
                            EMC Compliance Testing
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('frontend.contact-us') !!}">
                            Contact US
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('frontend.careers') !!}">
                            Careers
                        </a>
                    </li>
                </ul>
            </li>

             <li>
                <a href="{!! route('frontend.blog') !!}">
                    Blog
                </a>
            </li>


            @if ($logged_in_user)
                <li>
                    <a href="{!! route('frontend.my-orders') !!}">
                        My Orders
                    </a>
                </li>

                <li>
                    <a href="{!! route('frontend.my-cart') !!}">
                        Cart
                    </a>
                </li>
            @endif

            @if (! $logged_in_user)
                <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                @if (config('access.users.registration'))
                    {{-- <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li> --}}
                @endif
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ $logged_in_user->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @permission('view-backend')
                            <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                        @endauth

                        <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                        <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                    </ul>
                </li>
            @endif


                {{-- @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}
                            <span class="caret"></span>
                        </a>

                        @include('includes.partials.lang')
                    </li>
                @endif --}}

                
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>
