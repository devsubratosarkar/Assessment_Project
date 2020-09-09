@extends('admin.layouts.app')
@section('main-content')
<div class="container">
<div class="content-wrapper">

   <section class="content">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Contact')</h2>
                </div>

                <div class="card-body">
                  <div class="box-header">
                    @include('includes.messege')
                   </div>
                    <form action="{{ route('general.update',$generals->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>@lang('Contact Header')</label>
                                <input type="text" class="form-control" name="contact_header" value="{{$generals->contact_header}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>@lang('Contact Title')</label>
                                    <input type="text" class="form-control" name="contact_title" value="{{$generals->contact_title}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>@lang('Contact Number')</label>
                                <input type="text" class="form-control" name="contact_number" value="{{$generals->contact_number}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>@lang('Contact Email')</label>
                                <input type="email" class="form-control" name="contact_email" value="{{$generals->contact_email}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>@lang('Contact Address')</label>
                                <input type="text" class="form-control" name="contact_address" value="{{$generals->contact_address}}" required>
                            </div>
                            <div class="form-group col-md-4">
                        <label>@lang('Map')</label>
                        <input type="text" class="form-control" name="map_url" value="{{$generals->map_url}}" placeholder="https://example.com">
                    </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm btn-dark mt-2">@lang('Update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </section>
</div>
</div>

@endsection
