@extends('admin.layouts.app')
@section('main-content')
<div class="container">
  <div class="content-wrapper">

   <section class="content">
      <div class="card">
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
                       <th>@lang('Email')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($subscribers as $row => $subscriber)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>{{$subscriber->email}}</td>
                       <td>
                        <form id="delete-form-{{ $subscriber->id }}" action="{{ route('subscriber.destroy',$subscriber->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $subscriber->id }}').submit();
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
