@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Category Management Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('category.update',$categorys->id) }}" method="post" {{-- enctype="multipart/form-data" --}}>
                      @csrf
                      @method('PUT')
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" name="name" value="{{$categorys->name}}" required>
                                    </div>

                                    {{-- <div class="form-group col-md-12">
                                        <label>@lang('Description')</label>
                                        <textarea class="form-control" name="description" rows="9" required>{{$categorys->description}}</textarea>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                  <label>@lang('File Upload')</label>
                                  <input type="file" value="{{$categorys->file}}" name="file" id="fileToUpload">
                              </div><br>
                            <div class="form-group col-md-12">
                                <label>@lang('category Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="{{ asset('public/user/img/category/'.$blogs->image) }}" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          </div> --}}
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