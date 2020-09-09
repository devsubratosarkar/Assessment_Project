@extends('admin.layouts.app')
@section('main-content')
<div class="container">
  <div class="content-wrapper">

   <section class="content">
      <div class="card">
         <div class="card-header with-border">
            <h3 class="box-title">@lang('Counter')
            <a class="btn btn-dark btn-sm float-right" href="{{route('counter.create')}}">@lang('+ Add New')</a>
            </h3>
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
                       <th>@lang('Icon')</th>
                       <th>@lang('Title')</th>
                       <th>@lang('Number')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($counters as $row => $counter)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>{{$counter->icon}}</td>
                       <td>{{$counter->title}}</td>
                       <td>{{$counter->number}}</td>
                       <td><a href="{{ route('counter.edit',$counter->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>

                        <form id="delete-form-{{ $counter->id }}" action="{{ route('counter.destroy',$counter->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $counter->id }}').submit();
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
