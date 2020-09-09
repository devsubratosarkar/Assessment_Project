        <section class="hero hero-slider-wrapper hero-style-1">
            <div class="hero-slider">
                @foreach ($sliders as $slider)
                <div class="slide">
                    <img src="{{asset('public/user/img/slider/'.$slider->image)}}" alt class="slider-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 slide-caption">
                                <div class="slide-subtitle">
                                    <p>{{$slider->header}}</p>
                                </div>
                                <div class="slide-title">
                                    <h2>{{$slider->title}}</h2>
                                </div>
                                <div class="btns">
                                    <a href="{{route('user.about')}}" class="theme-btn">@lang('More About Us')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </section>