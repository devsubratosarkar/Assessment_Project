@php 
$general = App\Model\User\general::first();
@endphp
     <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
              </button>
              <div id="topbarHotNumber">
                 <i class="fas fa-headset shadow"></i>
                 <span>@lang('Hotline') : </span>
                 <strong>&nbsp;{{$general->contact_number}}</strong>
              </div>
              <ul class="navbar-nav ml-auto">
                 <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                       <form class="form-inline mr-auto w-100 navbar-search">
                          <div class="input-group">
                             <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                             <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                                </button>
                             </div>
                          </div>
                       </form>
                    </div>
                 </li>

                 <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       
                       <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                       <a class="dropdown-item" href="{{route('profile.index')}}">
                       <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                       @lang('Change Password')
                       </a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                       @lang('Logout')
                       </a>
                    </div>
                 </li>
              </ul>
           </nav>
