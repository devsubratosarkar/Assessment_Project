@extends('admin.layouts.app')
@section('main-content')
<div class="container">
  <div class="content-wrapper">

   <section class="content">
      <div class="card">
         <div class="card-header with-border">
            <h3>@lang('Menus')<a class="btn btn-dark btn-sm float-right" href="{{route('menu.create')}}">+ @lang('Add New')</a></h3>
         </div><br>
         <div class="box-body">
          <div class="box">
           <div class="box-header">
            @include('includes.messege')
           </div>
           <div class="card-body table-responsive">
              <table class="table">
                 <thead class="thead-dark">
                    <tr>
                       <th>@lang('S.No')</th>
                       <th>@lang('Image')</th>
                       <th>@lang('Name')</th>
                       <th>@lang('Title')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($menus as $row => $menu)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>
                          <img class="admin-img" src="{{ asset('public/user/img/menu_singel/'.$menu->image) }}">
                       </td>
                       <td>{{$menu->name}}</td>
                       <td>{{$menu->title}}</td>
                       <td><a href="{{ route('menu.edit',$menu->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>
                        
                        <form id="delete-form-{{ $menu->id }}" action="{{ route('menu.destroy',$menu->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $menu->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><span type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></span></a>
                     </td>
                   </tr>
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
