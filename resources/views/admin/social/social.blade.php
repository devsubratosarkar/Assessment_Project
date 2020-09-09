@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Social Create')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('social.store') }}" method="POST">
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>@lang('Social Icon')</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">@lang('fa fa')- </span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="icon" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('URL')</label>
                                        <input type="url" class="form-control" name="url" placeholder="https://example.com" required>
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
