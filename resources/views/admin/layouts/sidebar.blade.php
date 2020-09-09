   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">

         <div class="sidebar-brand-text mx-3">@lang('Logo')</div>
      </a>
      <div id="myUserType">
         <img src="{{ asset('public/user/img/logo.png') }}" class="rounded-circle" alt="Image" />
         <h4>{{auth()->guard('admin')->user()->name}}</h4>
         <strong>@lang('Admin')</strong>
      </div>

      <li class="nav-item active">
         <a class="nav-link" href="{{route('admin.home')}}">
         <i class="fas fa-home"></i>
         <span>@lang('Dashboard')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('menu.index')}}">
         <i class="fa fa-bars" aria-hidden="true"></i>
         <span>@lang('Menu')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('sub_menu.index')}}">
         <i class="fa fa-th-list" aria-hidden="true"></i>
         <span>@lang('Sub-Menu')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('blog.index')}}">
         <i class="fab fa-blogger" aria-hidden="true"></i>
         <span>@lang('Project Management')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('batch.index')}}">
         <i class="fa fa-certificate" aria-hidden="true"></i>
         <span>@lang('Batch')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('student.index')}}">
         <i class="fa fa-male" aria-hidden="true"></i>
         <span>@lang('Student')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('category.index')}}">
         <i class="fa fa-th" aria-hidden="true"></i>
         <span>@lang('Category Management')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('service.index')}}">
         <i class="far fa-calendar-alt"></i>
         <span>@lang('News & Events')</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#newsletter" aria-expanded="true" aria-controls="newsletter">
         <i class="fa fa-newspaper" aria-hidden="true"></i>
         <span>@lang('Newsletter')</span>
         </a>
         <div id="newsletter" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <a class="collapse-item" href="{{route('subscriber.index')}}">@lang('Subscriber')</a>
               <a class="collapse-item" href="{{route('send_email.index')}}">@lang('Send Email')</a>
            </div>
         </div>
      </li>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#web_interface" aria-expanded="true" aria-controls="web_interface">
         <i class="fa fa-globe" aria-hidden="true"></i>
         <span>@lang('Web Interface')</span>
         </a>
         <div id="web_interface" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               {{-- <a class="collapse-item" href="{{route('slider.index')}}">@lang('Slider')</a>
               <a class="collapse-item" href="{{route('work.index')}}">@lang('Work Area')</a>
               <a class="collapse-item" href="{{route('company.index')}}">@lang('Company')</a>
               <a class="collapse-item" href="{{route('testimonial.index')}}">@lang('Testimonial')</a>
               <a class="collapse-item" href="{{route('feature.index')}}">@lang('Features')</a>
               <a class="collapse-item" href="{{route('partner.index')}}">@lang('Partner')</a>
               <a class="collapse-item" href="{{route('service.index')}}">@lang('Services')</a>
               <a class="collapse-item" href="{{route('counter.index')}}">@lang('Counter')</a> --}}
               <a class="collapse-item" href="{{route('social.index')}}">@lang('Social')</a>
               <a class="collapse-item" href="{{route('logo.index')}}">@lang('Logo & Icon')</a>
               <a class="collapse-item" href="{{route('breadcrumbs.index')}}">@lang('Breadcrumbs')</a>
               <a class="collapse-item" href="{{route('about.index')}}">@lang('About')</a>
               <a class="collapse-item" href="{{route('contact.index')}}">@lang('Contact')</a>
               <a class="collapse-item" href="{{route('privacy_policy.index')}}">@lang('Privacy Policy')</a>
            </div>
         </div>
      </li>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#general" aria-expanded="true" aria-controls="general">
         <i class="far fa-user-circle"></i>
         <span>@lang('General')</span>
         </a>
         <div id="general" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <a class="collapse-item" href="{{route('general.index')}}">@lang('Settings')</a>
               <a class="collapse-item" href="{{route('profile.profileIndex')}}">@lang('Profile')</a>
            </div>
         </div>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
         <i class="fas fa-sign-out-alt"></i>
         <span>@lang('Logout')</span></a>
      </li>

      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
                        {{ csrf_field()}}
                      </form>

      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
   </ul>