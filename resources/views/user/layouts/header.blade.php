    <div class="page-wrapper">

    <header id="header" class="site-header header-style-1">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col col-md-10 col-sm-9">
                        <div class="contact-info">
                            <ul>
                                <li><i class="ti-mobile"></i> {{$general->contact_address}}</li>
                                <li><i class="ti-email"></i> {{$general->contact_email}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-md-2 col-sm-3">
                        <div class="social-icons">
                            <ul>
                                @foreach($socials as $social)
                                <li><a href="{{$social->url}}"><i class="ti-{{$social->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="open-btn">
                        <span class="sr-only">@lang('Toggle navigation')</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img class="navber-logo-img" src="{{ asset('public/user/img/logo.png') }}" alt></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                    <button class="close-navbar"><i class="ti-close"></i></button>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/') }}">@lang('Home')</a>
                        </li>
                        @foreach ($menus as $menu)
                        @if (count($menu->sub_menu) > 0)

                            <li class="menu-item-has-children">
                            <a href="#">{{$menu->name}}</a>
                            <ul class="sub-menu">
                                @foreach ($menu->sub_menu as $sub_menu)
                                <li><a href="{{route('user.single_submenu', $sub_menu->id)}}">{{$sub_menu->name}}</a></li>
                                @endforeach
                                
                            </ul>
                        </li>

                        @else
                            <li><a href="{{route('user.single_menu', $menu->id)}}">{{$menu->name}}</a></li>
                        @endif

                        @endforeach

                        <li><a href="{{route('user.single_blog')}}">@lang('Project')</a></li>

                        <li><a href="{{route('user.contacts')}}">@lang('Contact')</a></li>
                    </ul>
                </div>
                <div class="cart-search-contact">
                        <div class="header-search-form-wrapper">
                            <button class="search-toggle-btn"><i class="fi flaticon-search"></i></button>
                            <div class="header-search-form">
                                <form type="get" action="{{ route('search.title') }}">
                                    <div>
                                        <input type="text" name="title" class="form-control" placeholder="Search here...">
                                        <button type="submit"><i class="fi flaticon-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </nav>
    </header>