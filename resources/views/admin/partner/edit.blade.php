@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Partner Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('partner.update',$partners->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                               <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>@lang('Partner Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="{{ asset('public/user/img/partners/'.$partners->image) }}" class="image_to_upload"/>
                                      </div>
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
      </section>
   </div>
</div>
@endsection