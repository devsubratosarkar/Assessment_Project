        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img class="footer-logo-img" src="{{ asset('public/user/img/logo.png') }}" alt>
                                </div>
                                <p>{{$general->footer_description}}</p>
                                <div class="social-icons">
                                    <ul>
                                    @foreach ($socials as $social)
                                    <li><a href="{{$social->url}}"><i class="ti-{{$social->icon}}"></i></a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>@lang('Navigation')</h3>
                                </div>
                                <ul>
                                    @foreach ($menus as $menu)
                                    <li><a href="{{route('user.single_menu', $menu->id)}}">{{$menu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                      <!--   <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget link-widget service-link-widget">
                                <div class="widget-title">
                                    <h3>@lang('Our Services')</h3>
                                </div>
                                <ul>
                                    @foreach ($services as $service)
                                    <li><a href="{{route('user.service_details', $service->id)}}">{{$service->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> -->
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget contact-widget">
                                <div class="widget-title">
                                    <h3>@lang('Contact Info')</h3>
                                </div>
                                <ul>
                                    <li>{{$general->contact_address}}</li>
                                    <li><span>@lang('Email'): </span> {{$general->contact_email}}</li>
                                    <li><span>@lang('Phone'): </span> {{$general->contact_number}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="separator"></div>
                        <div class="col col-xs-12">
                            <p class="copyright">{!! $general->footer !!}</p>
                            <ul>
                                <li><a href="{{route('user.about')}}">@lang('About Us')</a></li>
                                <li><a href="{{route('user.privacy_policy')}}">@lang('Privacy Policy')</a></li>
                                <li><a href="{{route('user.contacts')}}">@lang('Contact')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>




    <script src="{{ asset('public/user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/user/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('public/user/js/script.js') }}"></script>


    @section('footer')

    @show