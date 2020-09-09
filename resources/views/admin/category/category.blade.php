@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Project Management Create')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                    {{-- <div class="form-group col-md-12">
                                        <label>@lang('Description')</label>
                                        <textarea class="form-control" name="description" rows="9" required></textarea>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                  <label>@lang('File Upload')</label>
                                  <input type="file" name="file" id="fileToUpload">
                              </div>
                              <div class="form-group col-md-12">
                                <label>@lang('Project Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image" required>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div> --}}
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-dark mt-2">@lang('Submit')</button>
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
