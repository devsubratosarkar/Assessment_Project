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
                        <h2>@lang('Project Details')</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">@lang('Home')</a></li>
                            <li>@lang('Project Details')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-single-section blog-fullwidth-single-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-9">
                        <div class="blog-content">
                            <div class="post">
                                <div class="entry-media">
                                    <img class="blogSingle-img" src="{{asset('public/user/img/blog/'.$blogSingle->image)}}" alt>
                                </div>
                                <h2>{{$blogSingle->title}}</h2>
                                <ul class="meta">
                                    <li>@lang('By:') <a>@lang('Admin')</a></li>
                                    <li><a>{{$blogSingle->created_at->format('Y-m-d')}}</a></li>
                                </ul>
                                <div class="entry-details">
                                    <p>{!! $blogSingle->description !!}</p>
                                </div>
                                @foreach ($blogSingle->project_file as $project_file)
                                    
                            <a class="btn btn-success btn-sm mt-2" href="{{ url('public/user/file/', $project_file->file)}}" download> <span>{{$project_file->file_name}}</span> Download</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="blog-sidebar">
                        <div class="widget popular-post-widget">
                                <h3>@lang('Related posts')</h3>
                                    @foreach (App\Model\user\blog::where('id', '!=', $blogSingle->id)->take(4)->get() as $blog)
                                <ul>
                                    <li>
                                        
                                        <div class="post-image">
                                            <a><img src="{{asset('public/user/img/blog/'.$blog->image)}}" alt></a>
                                        </div>
                                        <div class="post-info">
                                            <a href="{{route('user.blog_details', $blog->id)}}"><span class="post-title">{{$blog->title}}</span></a>
                                        </div>
                                    </li>
                                </ul>
                                    @endforeach
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