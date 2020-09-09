@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Privacy Policy')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('general.update',$generals->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                          <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>@lang('Privacy Policy Title')</label>
                                        <input type="text" class="form-control" name="privacy_policy_title" value="{{$generals->privacy_policy_title}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Privacy Policy Description')</label>
                                        <textarea id="textAreaNiceEditor" class="form-control" name="privacy_policy_description" rows="9">{{$generals->privacy_policy_description}}</textarea>
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