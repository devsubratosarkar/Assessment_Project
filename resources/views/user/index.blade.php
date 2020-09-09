@extends('user/app')
  @section('main-content')
        <section class="features-section">
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="features-grids" style="background-color: #30379b;">
                                
                                    <div class="col-md-6">
                               <h2 class="bobt text-center"><span style="color: #000;">CATEGORY</span></h2><br>
                               <div class="row">
                                   @foreach ($categorys as $category)
                                   <div class="col-md-3 text-center">
                                       <p><a style="color: #0cf29c;" href="{{ route('user.blog.categorywise', $category->id) }}">{{$category->name}}</a></p>
                                   </div>
                                    @endforeach
                               </div>
                           </div>
                           <div class="col-md-6">
                            <div class="widget search-widget">
                                <h2 class="bobt text-center"><span style="color: #000;">ADVANCE SEARCH</span></h2><br>
                                <form action="{{route('advance.search')}}" method="GET" id="submitopl">
                                    <div class="form-group">
                                        <input style="background: transparent; border: none; border: 1px solid #fff;" type="text" class="form-control" name="title" placeholder="Project Title">
                                    </div>
                                    <div class="form-group">
                                        <input style="background: transparent; border: none; border: 1px solid #fff;" type="text" class="form-control" name="student" placeholder="Student Name">
                                    </div>
                                    <div class="form-group">
                                        <input style="background: transparent; border: none; border: 1px solid #fff;" type="text" class="form-control" name="roll" placeholder="Exam Roll">
                                    </div>
                                    <div class="form-group col-md-6">  
                                    <select style="background: transparent; border: none; border: 1px solid #fff; color: #a8a3a3;" class="form-control" name="cat_id">
                                        <option value="" selected>All Category</option>
                                        @foreach ($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">  
                                    <select style="background: transparent; border: none; border: 1px solid #fff; color: #a8a3a3;" class="form-control" name="batch_id">
                                        <option value="" selected>All Batch</option>
                                        @foreach ($batchs as $batch)
                                        <option value="{{$batch->id}}">{{$batch->name}}</option>
                                         @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <a class="btn btn-primary" onclick="document.getElementById('submitopl').submit();" type="submit">Advance Search</a>
                                    </div >
                                </form>
                            </div>
                          </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </section>

{{-- 
        <section class="about-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-9">
                        <div class="section-title-s2">
                            <span>{{$general->company_header}}</span>
                            <h2>{{$general->company_title}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-7 col-md-7">
                        <div class="about-features clearfix">
                            @foreach ($companies as $company)
                            <div class="grid">
                                <div class="icon">
                                    <img src="{{asset('public/user/img/company/'.$company->image)}}" alt>
                                </div>
                                <div class="details">
                                    <h3>{{$company->title}}</h3>
                                    <p>{!! clean($company->description) !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col col-lg-4 col-lg-offset-1 col-md-5">
                        <div class="video-holder">
                            <div class="img-holder">
                                <img src="{{ asset('public/user/img/about_image.png') }}" alt>
                            </div>
                            <a href="{{$general->about_video}}" class="video-btn" data-type="iframe">
                                <i class="fi flaticon-round-play-button"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials-section section-padding">
            <div class="pattern">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col col-lg-8 col-lg-offset-2">
                        <div class="testimonials-grids testimonials-slider">
                            @foreach ($testimonials as $testimonial)
                            <div class="grid">
                                <div class="quote">
                                    <p>{!! clean($testimonial->description) !!}</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-pic">
                                        <img src="{{asset('public/user/img/testimonials/'.$testimonial->image)}}" alt>
                                    </div>
                                    <h4>{{$testimonial->name}}</h4>
                                    <span>{{$testimonial->designation}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-projects section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-10 col-lg-offset-1">
                        <div class="section-title-s3">
                            <span>{{$general->features_header}}</span>
                            <h2>{{$general->features_title}}</h2>
                            <p>{!! clean($general->features_description) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="projects-grids clearfix">
                            @foreach ($features as $key => $feature)
                                @if(($key % 2 == 0))
                                  <div class="grid">
                                <div class="project-pic">
                                    <img class="feature-img" src="{{asset('public/user/img/projects/'.$feature->image)}}" alt>
                                </div>
                                <div class="details">
                                    <div class="inner">
                                        <div class="count">{{$key + 1}}</div>
                                        <h4>{{$feature->title}}</h4>
                                        <p>{{substr($feature->description, 0, 200)}}...</p>
                                        <a href="{{route('user.project_details', $feature->id)}}" class="theme-btn">@lang('View Project')</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="grid right-text">
                                <div class="details">
                                    <div class="inner">
                                        <div class="count">{{$key + 1}}</div>
                                        <div class="count"></div>
                                        <h4>{{$feature->title}}</h4>
                                        <p>{{substr($feature->description, 0, 200)}}...</p>
                                        <a href="{{route('user.project_details', $feature->id)}}" class="theme-btn">@lang('View Project')</a>
                                    </div>
                                </div>
                                <div class="project-pic">
                                    <img src="{{asset('public/user/img/projects/'.$feature->image)}}" alt>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="view-all">
                            <a href="{{route('user.single_feature')}}">@lang('View All Project') <i class="fi flaticon-slim-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="partners-section">
            <h2 class="hidden">@lang('Partners')</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="partner-grids partners-slider">
                            @foreach ($partners as $partner)
                            <div class="grid">
                                <img class="partner-img" src="{{asset('public/user/img/partners/'.$partner->image)}}" alt>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <h2 class="hidden">@lang('Contact')</h2>
            <div class="content-area">
                <div class="left-col">
                    <div class="contact-form">
                    @include('includes.messege')
                        <form action="{{ route('user.contactEmail') }}" method="post">
                            @csrf
                            <div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email ">
                            </div>
                            <div>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject *">
                            </div>
                            <div>
                                <textarea class="form-control" name="message"  id="note" placeholder="Message..."></textarea>
                            </div>
                            <div class="submit-btn-wrapper">
                                <button type="submit" class="theme-btn-s3">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-col">
                    <div class="contact-info">
                        <ul>
                            <li><i class="ti-mobile"></i> <span>@lang('Phone'):</span> {{$general->contact_number}}</li>
                            <li><i class="ti-email"></i> <span>@lang('Email'):</span> {{$general->contact_email}}</li>
                            <li><i class="ti-location-pin"></i> <span>@lang('Address'):</span> {{$general->contact_address}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="fun-fact-section">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="funfact-grids">
                            @foreach ($counters as $counter)
                            <div class="grid">
                                <span class="icon">
                                    <i class="fi {{$counter->icon}}"></i>
                                </span>
                                <div>
                                    <h3><span class="odometer" data-count="{{$counter->number}}">@lang('00')</span>+</h3>
                                </div>
                                <p>{{$counter->title}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="recent-blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-9">
                        <div class="section-title">
                            <span>{{$general->blog_header}}</span>
                            <h2>{{$general->blog_title}}</h2>
                            <p>{!! clean($general->blog_description) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="blog-grids clearfix">
                            @foreach ($blogs as $blog)
                            <div class="grid">
                                <div class="img-holder">
                                    <img src="{{asset('public/user/img/blog/'.$blog->image)}}" alt>
                                </div>
                                <div class="date">
                                    <p>{{$blog->created_at->format('d')}} <span>{{$blog->created_at->format('M')}}</span></p>
                                </div>
                                <div class="details">
                                    <h3><a href="{{route('user.blog_details', $blog->id)}}">{{$blog->title}}</a></h3>
                                    <div class="meta">
                                        <ul>
                                            <li>@lang('By') - &nbsp;<a>@lang('Admin')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <section class="blog-pg-section blog-fullwidth-pg-section section-padding">
            <div class="container">
              <div class="row">
                    <div class="col col-md-12">
                        <div class="section-title">
                            <span>{{$general->blog_header}}</span>
                            <h2>{{$general->blog_title}}</h2>
                            <p>{!! clean($general->blog_description) !!}</p>
                        </div>
                
                <div class="row">
                    <div class="col col-xm-12">
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
                                {{-- <ul class="meta">
                                    <li>@lang('By'): <a>@lang('Admin')</a></li>
                                    <li><a>{{$blog->created_at->format('Y-m-d')}}</a></li>
                                </ul> --}}
                                {{-- <div class="entry-details">
                                    <p>{{substr($blog->description, 0, 50)}}....</p>
                                    <a href="{{route('user.blog_details', $blog->id)}}" class="read-more">@lang('Read More') -</a>
                                </div> --}}
                            </div>
                        </div>


                        @endforeach
                        </div>
                        @endforeach
                        </div>
                           
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </section>
            <section class="services-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-9">
                        <div class="section-title">
                            <span>{{$general->service_header}}</span>
                            <h2>{{$general->service_title}}</h2>
                            <p>{!! clean($general->service_description) !!}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-xs-12">
                        <div class="service-grids clearfix">
                            @foreach ($services as $service)
                            <div class="grid">
                                <div class="img-holder">
                                    <img class="service-img" src="{{asset('public/user/img/services/'.$service->image)}}" alt>
                                    <div class="view-details">
                                        <a href="{{route('user.service_details', $service->id)}}">@lang('Get Details')</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h3><a href="{{route('user.service_details', $service->id)}}">{{$service->title}}</a></h3>
                                </div>
                            </div>
                            @endforeach
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


  @endsection