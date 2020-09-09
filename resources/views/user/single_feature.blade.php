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
                        <h2>@lang('Projects')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('Projects')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-pg-section blog-fullwidth-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="blog-content">
                            <div class="row">
                        @foreach ($features as $feature)
                        <div class="col-md-4">
                            <div class="post">
                                <div class="entry-media">
                                    <img class="single-feature-img" src="{{asset('public/user/img/projects/'.$feature->image)}}" alt>
                                </div>
                                <h3><a href="{{route('user.project_details', $feature->id)}}">{{$feature->title}} </a></h3>
                                <div class="entry-details">
                                    <p>{{substr($feature->description, 0, 100)}}....</p>
                                    <a href="{{route('user.project_details', $feature->id)}}" class="read-more">@lang('Read More') -</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                            <div class="pagination-wrapper">
                                {!! $features->links() !!}
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