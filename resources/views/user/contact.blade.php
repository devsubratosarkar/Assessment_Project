<!DOCTYPE html>
<html lang="en">
<head>
    @include('user/layouts/head')

</head>
<body>

    @include('user/layouts/header')

        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>@lang('Contact')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('Contact')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s2">
                            <span>@lang('Our contact info')</span>
                            <h2>@lang('Contact with us')</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="contact-form">
                            @include('includes.messege')
                            <form action="{{ route('user.contactEmail') }}" method="post">
                                @csrf
                                <div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email ">
                                </div>
                                <div>
                                    <input type="text" name="subject" class="form-control" placeholder="Your Subject">
                                </div>
                                <div>
                                    <textarea name="message" rows="10" class="form-control" id="shaons" placeholder="Massage..."></textarea>
                                </div>
                                <div class="submit-btn-wrapper">
                                    <button type="submit" class="theme-btn-s3">@lang('Submit')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="info-box-outer">
                            <div class="info-box">
                                <div class="grid">
                                    <h3>@lang('Address')</h3>
                                    <p>{{$general->contact_address}}</p>
                                </div>
                                <div class="grid">
                                    <h3>@lang('Phone')</h3>
                                    <p>{{$general->contact_number}}</p>
                                </div>
                                <div class="grid">
                                    <h3>@lang('Email')</h3>
                                    <p>{{$general->contact_email}}</p>
                                </div>
                                <div class="grid">
                                    <ul class="social">
                                    	@foreach ($socials as $social)
                                        <li><a href="{{$social->url}}"><i class="ti-{{$social->icon}}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="contact-map">
                            {!! $general->map_url !!}
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

        <section class="newsletter-section">
            <h2 class="hidden">@lang('Newsletter')</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="newsletter">
                            <div class="newsletter-form">
                                 @include('includes.subscribemsg')
                                <form action="{{ route('sub-store') }}" method="post">
                                    @csrf
                                    <input type="text" class="form-control" name="email" placeholder="Subscrib Newsletter (Enter Email Address)">
                                    <button type="submit"><i class="ti-email"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @include('user/layouts/footer')

</body>
</html>