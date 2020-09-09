@extends('admin.layouts.app')
@section('main-content')
<div class="right_col" role="main">
           
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Edit Profile Password')</h2>
                </div>
                <div class="card-body">
                  @include('includes.messege')
                    <form action="{{ route('profile.passwordUpdate') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>@lang('Current Password') :</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>@lang('New Password') :</label>
                                <input type="password" name="newpassword" class="form-control" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label>@lang('Confirm Password') :</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
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

