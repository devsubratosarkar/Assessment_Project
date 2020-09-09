@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Partner Create')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>@lang('Partner Image') <small>(@lang('PNG format is standard'))</small></label>
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
