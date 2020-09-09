@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Work Create')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" required="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('Description')</label>
                                        <textarea class="form-control" name="description" rows="9" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('Work Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image" required>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Submit')</button>
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
