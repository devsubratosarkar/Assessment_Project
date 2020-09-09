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
                                <label>@lang('Project Header')</label>
                                <input type="text" class="form-control" name="blog_header" value="{{$generals->blog_header}}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>@lang('Project Title')</label>
                                <input type="text" class="form-control" name="blog_title" value="{{$generals->blog_title}}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>@lang('Project Description')</label>
                                <input type="text" class="form-control" name="blog_description" value="{{$generals->blog_description}}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm mt-2">@lang('Update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card text-center">

                <div class="card-body">
                  <div class="box-header">
                   </div>
                    <form action="{{ route('search.project') }}" method="get">
                        <div class="form-row">
                          <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="text-center">@lang('Search Project')</label>
                                <input type="text" class="form-control" name="title" value="{{ isset($request) ? $request->title : '' }}" placeholder="Search here...">
                            </div>
                          </div>
                          <div class="col-md-3">
                            
                            <div class="form-group">
                                <label class="text-center">@lang('Start Date Project')</label>
                                <input type="text" class="form-control" name="start_date" value="{{ isset($request) ? $request->start_date : '' }}" id="start_date" placeholder="Start Date...">
                            </div>
                          </div>
                          <div class="col-md-3">
                            
                            <div class="form-group">
                                <label class="text-center">@lang('End Date Project')</label>
                                <input type="text" class="form-control" name="end_date" value="{{ isset($request) ? $request->end_date : '' }}" id="end_date" placeholder="End Date...">
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm mt-2">@lang('SEARCH')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <div class="card">
         <div class="card-header with-border">
            <h3 class="box-title">@lang('Project Management')
            <a class="btn btn-dark btn-sm float-right" href="{{route('blog.create')}}">+ @lang('Add New')</a>
            </h3>
         </div><br>
         <div class="box-body">
          <div class="box">
           <div class="card-body table-responsive">
              <table class="table">
            @if (count($blogs) == 0)
                <h2 class="text-center">NO Project FOUND</h2>
            @else
                 <thead class="thead-dark">
                    <tr>
                       <th>@lang('S.No')</th>
                       <th>@lang('Image')</th>
                       <th>@lang('Title')</th>
                       <th>@lang('Updated At')</th>
                       <th>@lang('Action')</th>
                    </tr>
                 </thead>
                 <tbody>

                  @foreach($blogs as $row => $blog)
                    <tr>
                        
                       <td>{{$row + 1}}</td>
                       <td>
                          <img class="admin-img" src="{{ asset('public/user/img/blog/'.$blog->image) }}">
                       </td>
                       <td>{{$blog->title}}</td>
                       <td>{{$blog->updated_at->format('Y-m-d / h:i A')}}</td>
                       <td><a href="{{ route('blog.edit',$blog->id) }}"><span type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span></a>

                        <form id="delete-form-{{ $blog->id }}" action="{{ route('blog.destroy',$blog->id) }}" method="post" style="display: none">
                          @csrf
                          @method('DELETE')
                       </form>
                       <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $blog->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><span type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></span></a>
                     </td>
                   </tr>
                  @endforeach
                     </tbody>
                  @endif
                  </table>
               </div>
               <div class="row">
                <div class="col-md-7">
                  <div class="pagination-wrapper float-right">
                      {!! $blogs->links() !!}
                  </div>
                </div>
                 
               </div>
                  
            </div>
         </div>
      </div>
   </section>
</div>
</div>

@endsection

@section('footerSection')

  <script>
  $( function() {
    $( "#start_date" ).datepicker({
      'dateFormat' : 'yy-mm-d'
    });
    $( "#end_date" ).datepicker({
      'dateFormat' : 'yy-mm-d'
    } );
  } );
  </script>

@endsection
