@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Batch Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('batch.update',$batchs->id) }}" method="post">
                      @csrf
                      @method('PUT')
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" name="name" value="{{$batchs->name}}" required>
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