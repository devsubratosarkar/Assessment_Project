@extends('admin.layouts.app')
@section('main-content')
<div class="container">

<div class="content-wrapper">

   <section class="content">
      <div class="card">
         <div class="card-header with-border">
            <h3 class="box-title">@lang('Category Management')
            <a class="btn btn-dark btn-sm float-right" href="{{route('category.create')}}">+ @lang('Add New')</a>
            </h3>
         </div><br>
          @include('includes.messege')
         <div class="box-body">
          <div class="box">
           <div class="card-body table-responsive">
              <table class="table">
                 <thead class="thead-dark">
                    <tr>
                       <th>@lang('S.No')</th>
                       <th>@lang('Name')</th>
                       <th>@lang('View')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($categorys as $row => $category)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>{{$category->name}}</td>
                       <td><a href="{{ route('use.cat.category', $category->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></td>
                       {{-- <td>
                          <img class="admin-img" src="{{ asset('public/user/img/category/'.$category->image) }}">
                       </td> --}}
                       <td><a href="{{ route('category.edit',$category->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>

                        <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $category->id }}').submit();
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
