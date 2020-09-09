@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h2>@lang('Breadcrumbs & Background')</h2>
                  </div>
                  <div class="card-body">
                     @include('includes.messege')
                    <div class="row">
                      <div class="col-md-4">
                     <form action="{{ route('breadcrumbs.updateMenuimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                 <div class="form-group col-md-10">
                                    <label>@lang('Menu Image')<small>(@lang('PNG format is standard'))</small></label>
                                    <input type="file" id="file-input" class="form-control" name="menu_bg_img" required>
                                    <div class="row mt-2">
                                       <div class="form-group col-md-12">
                                          <div class="preview hide">
                                             <img id="dvd_image" align="middle" src="{{ asset('public/user/img/menu_bg_img.png') }}"/>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            <div class="box-footer">
                           <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                        </div>
                     </form>
                   </div>
                    <div class="col-md-4">
                     <form action="{{ route('breadcrumbs.updateAboutimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-10">
                           <label>@lang('About Image')<small>(@lang('PNG format is standard'))</small></label>
                           <input type="file" id="file-input2" class="form-control" name="about_img" required>
                           <div class="row mt-2">
                              <div class="form-group col-md-12">
                                 <div class="preview hide">
                                    <img id="dvd_image2" align="middle" src="{{ asset('public/user/img/about_image.png') }}"/>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                        </div>
                      </form>
                      </div>
                      <div class="col-md-4">
                     <form action="{{ route('breadcrumbs.updateContactimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-11">
                           <label>@lang('Contact Image') <small>(@lang('PNG format is standard'))</small></label>
                           <input type="file" id="file-input3" class="form-control" name="contact_bg_img" required>
                           <div class="row mt-2">
                              <div class="form-group col-md-12">
                                 <div class="preview hide">
                                    <img id="dvd_image3" align="middle" src="{{ asset('public/user/img/contact_bg_img.png') }}"/>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
        </section>
        </div>
      </div>
      
@endsection

