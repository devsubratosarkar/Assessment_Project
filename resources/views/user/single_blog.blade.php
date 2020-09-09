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
                        <h2>@lang('Project')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            @if (isset($search))
                                <li> {{$search}}</li>

                            @else

                             <li> @lang('Project')</li>
                            @endif
                            
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-pg-section blog-fullwidth-pg-section section-padding">
            <div class="container">
                <div class="row">
                    @if (count($blogs) == 0)
                        <h2 class="text-center">NO Project FOUND</h2>
                    @else
                    <div class="col col-xs-12">
                        <div class="blog-content">

                        @foreach ($blogs->chunk(3) as $data)
                        <div class="row m-5">
                        @foreach ($data as $blog) 

                        <div class="col-md-4">
                            <div class="post">
                                <div class="entry-media">
                                    <img class="single-blog-img" src="{{ asset('public/user/img/blog/'.$blog->image) }}" alt>
                                </div>
                                <h3><a href="{{route('user.blog_details', $blog->id)}}">{{$blog->title}} </a></h3>
                                <ul class="meta">
                                    <li>@lang('By'): <a>@lang('Admin')</a></li>
                                    <li><a>{{$blog->created_at->format('Y-m-d')}}</a></li>
                                </ul>
                                <div class="entry-details">
                                    <p>{!!substr($blog->description, 0, 200)!!}....</p>
                                    <a href="{{route('user.blog_details', $blog->id)}}" class="read-more">@lang('Read More') -</a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        </div>
                        @endforeach
                        </div>
                            <div class="pagination-wrapper">
                                {!! $blogs->links() !!}
                            </div>
                        </div>
                    </div>
                        @endif
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