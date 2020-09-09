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
                        <h2>@lang('Privacy Policy')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('Privacy Policy')</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start about-pg-section -->
        <section class="about-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="about-text">
                            <h2>{{$general->privacy_policy_title}}</h2>
                            <p>{!! clean($general->privacy_policy_description) !!}</p>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end about-pg-section -->

        <!-- stat cta-s2-section -->
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
        <!-- end cta-s2-section -->

        <!-- start newsletter-section -->
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
            </div> <!-- end container -->
        </section>
        <!-- end newsletter-section -->

    @include('user/layouts/footer')

</body>
</html>