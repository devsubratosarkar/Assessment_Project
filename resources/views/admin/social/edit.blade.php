@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Social Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('social.update',$socials->id) }}" method="post">
                      @csrf
                      @method('PUT')
                               <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                <div class="form-group col-md-6">
                                        <label>@lang('Social Icon')</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">@lang('fa fa')- </span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="icon" value="{{$socials->icon}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('URL')</label>
                                        <input type="url" class="form-control" name="url" placeholder="https://example.com" value="{{$socials->url}}" required>
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