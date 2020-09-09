@extends('admin.layouts.app')
@section('main-content')
<div class="container">
<div class="content-wrapper">

   <section class="content">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Title') &amp; @lang('Subtitle')</h2>
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
                                <label>@lang('Company Title')</label>
                                <input type="text" class="form-control" name="company_title" value="{{$generals->company_title}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>@lang('Company Header')</label>
                                <input type="text" class="form-control" name="company_header" value="{{$generals->company_header}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>@lang('About Video URL')</label>
                                <input type="url" class="form-control" name="about_video" value="{{$generals->about_video}}" placeholder="https://example.com">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">@lang('Update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <div class="card">
         <div class="card-header with-border">
            <h3 class="box-title">@lang('Company')
            <a class="btn btn-dark btn-sm float-right" href="{{route('company.create')}}">@lang('+ Add New')</a>
            </h3>
         </div><br>
         <div class="box-body">
          <div class="box">
           <div class="card-body table-responsive">
              <table class="table">
                 <thead class="thead-dark">
                    <tr>
                       <th>@lang('S.No')</th>
                       <th>@lang('Image')</th>
                       <th>@lang('Title')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($companys as $row => $company)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>
                          <img class="admin-img" src="{{ asset('public/user/img/company/'.$company->image) }}">
                       </td>
                       <td>{{$company->title}}</td>
                       <td><a href="{{ route('company.edit',$company->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>

                        <form id="delete-form-{{ $company->id }}" action="{{ route('company.destroy',$company->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $company->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><span type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></span></a>
                     </td>
                  @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
  </div>
</div>

@endsection
