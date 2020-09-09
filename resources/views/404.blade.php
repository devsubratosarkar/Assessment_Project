<!DOCTYPE html>
<html lang="en">
<head>
@php 
$general = App\Model\User\general::first();
$socials = App\Model\User\social::all();
$menus = App\Model\User\menu::all();
$services = App\Model\User\service::all();
@endphp
    
    @include('user/layouts/head')

</head>
<body>

    @include('user/layouts/header')


        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>@lang('404')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('404')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="error-404-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-10 col-md-offset-1">
                        <div class="content">
                            <h2>@lang('404')</h2>
                            <h3>@lang('The page you are looking for does not exist.')</h3>
                            <p>@lang('We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly.')</p>
                            <a href="{{ url('/') }}" class="theme-btn-s2">@lang('Go back home')</a>

                            <div class="icon">
                                <i class="ti-home"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-s2-section">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-9">
                        <h3>{{$general->contact_header}}</h3>
                    </div>
                    <div class="col col-sm-3">
                        <div class="contact-btn">
                            <a href="{{route('user.contacts')}}" class="theme-btn-s4">@lang('Contact With Us')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @include('user/layouts/footer')

</body>
</html>
