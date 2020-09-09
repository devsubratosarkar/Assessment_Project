@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Work Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('work.update',$works->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                               <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" value="{{$works->title}}" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('Description')</label>
                                        <textarea class="form-control" name="description" rows="9" required>{{$works->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('Work Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="{{ asset('public/user/img/works/'.$works->image) }}" class="image_to_upload"/>
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
         </div>
      </section>
   </div>
</div>
@endsection