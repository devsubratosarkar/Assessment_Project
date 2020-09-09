@extends('admin.layouts.app')
@section('main-content')
<div class="container">

<div class="content-wrapper">

   <section class="content">
      <div class="card">
         <div class="card-header with-border">
            <h3 class="box-title">@lang('Batch')
            <a class="btn btn-dark btn-sm float-right" href="{{route('batch.create')}}">+ @lang('Add New')</a>
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
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>
                  @foreach($batchs as $row => $batch)
                    <tr>
                       <td>{{$row + 1}}</td>
                       <td>{{$batch->name}}</td>
                       <td><a href="{{ route('batch.edit',$batch->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>

                        <form id="delete-form-{{ $batch->id }}" action="{{ route('batch.destroy',$batch->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $batch->id }}').submit();
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
