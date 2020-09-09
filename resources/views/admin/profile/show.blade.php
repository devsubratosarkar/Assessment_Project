@extends('admin.layouts.app')
@section('main-content')
<div class="right_col" role="main">
           
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Edit Profile')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('profile.profileUpdate') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>@lang('Name')</label>
                                <input type="text" class="form-control" name="name" value="{{$admins->name}}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>@lang('Email')</label>
                                <input type="email" class="form-control" name="email" value="{{$admins->email}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
@endsection

