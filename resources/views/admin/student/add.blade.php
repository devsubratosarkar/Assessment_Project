@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Student Create')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" id="submitopl">
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                  <div class="form-group col-md-6">
                                        <label>@lang('Select Student')</label><br>
                                        <select class="form-control" name="batch_id">
                                          @foreach($batchs as $batch)
                                            <option value="{{$batch->id}}">{{ $batch->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('Name')</label><br>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>@lang('Roll')</label><br>
                                        <input type="text" class="form-control" name="roll" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-dark mt-2" onclick="document.getElementById('submitopl').submit();">@lang('Submit')</button>
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
