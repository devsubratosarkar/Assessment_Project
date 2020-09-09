@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h2>@lang('Logo & Icon Update')</h2>
                  </div>
                  <div class="card-body">
                     @include('includes.messege')
                    <div class="row">
                      <div class="col-md-6">
                     <form action="{{ route('logo.updateLogo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                 <div class="form-group col-md-6">
                                    <label>@lang('Logo') <small>(@lang('PNG format is standard'))</small></label>
                                    <input type="file" id="file-input" class="form-control" name="logo">
                                    <div class="row mt-2">
                                       <div class="form-group col-md-12">
                                          <div class="preview hide">
                                             <img id="dvd_image" align="middle" src="{{ asset('public/user/img/logo.png') }}" />
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            <div class="box-footer">
                           <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                        </div>
                     </form>
                   </div>
                    <div class="col-md-6">
                     <form action="{{ route('logo.updateIcon') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6">
                           <label>@lang('Icon') <small>(@lang('PNG format is standard'))</small></label>
                           <input type="file" id="file-input2" class="form-control" name="icon">
                           <div class="row mt-2">
                              <div class="form-group col-md-12">
                                 <div class="preview hide">
                                    <img id="dvd_image2" align="middle" src="{{ asset('public/user/img/icon.png') }}"/>
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

