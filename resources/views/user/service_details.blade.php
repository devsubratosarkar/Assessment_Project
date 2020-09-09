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
                        <h2>@lang('Service single')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('Service single')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-single-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-9 col-md-8 col-lg-push-3 col-md-push-4">
                        <div class="service-single-content">
                            <div class="service-pic">
                                <img src="{{asset('public/user/img/services/'.$seviceSingle->image)}}" alt>
                            </div>
                            <h2>{{$seviceSingle->title}}</h2>
                            <p>{!! clean($seviceSingle->description) !!}</p>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-4 col-lg-pull-9 col-md-pull-8">
                        <div class="service-sidebar">
                            <div class="widget service-list-widget">
                                <ul>
                                    @foreach ($services as $service)
                                    <li><a href="{{route('user.service_details',$service->id)}}">{{$service->title}}</a></li>
                                    @endforeach
                                    
                                </ul>
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
