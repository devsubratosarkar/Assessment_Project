@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Counter Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('counter.update',$counters->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                               <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="row">

                                  <div class="form-group col-md-6">
                                      <label>@lang('Counter Icon')</label>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@lang('fa fa-') </span>
                                      <input type="text" class="form-control" aria-describedby="basic-addon1" name="icon" value="{{$counters->icon}}" required>
                                    </div>
                                  </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" value="{{$counters->title}}"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('Number')</label>
                                        <input type="text" class="form-control" name="number" value="{{$counters->number}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block btn-sm btn-dark mt-2">@lang('Update')</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
   </div>
</div>
@endsection