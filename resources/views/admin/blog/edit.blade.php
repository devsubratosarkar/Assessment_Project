@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Project Management Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('blog.update',$blogs->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                  <div class="form-group col-md-12">
                                        <label>@lang('Select Category')</label><br>
                                        <select class="form-control"  name="cat_id">
                                          @foreach($categorys as $category)
                                            <option value="{{$category->id}}"
                                             
                                                @if ($blogs->cat_id == $category->id)
                                                  selected
                                                @endif
                                             
                                              >{{ $category->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Select Batch')</label><br>
                                        <select class="form-control"  name="batch_id" id="batchSel">
                                          @foreach($batchs as $batch)
                                            <option value="{{$batch->id}}"
                                             
                                                @if ($blogs->batch_id == $batch->id)
                                                  selected
                                                @endif
                                             
                                              >{{ $batch->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Select Team Mate')</label><br>
                                    <select class="form-control js-example-basic-multiple" name="student_id[]" id="studentList" multiple>
                                      @foreach($project_student as $student)
                                            <option value="{{$student->id}}"

                                              
                                              @if (in_array($student->id,$selectedBlogAtudentId) )
                                                  selected
                                                @endif

                                                >{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" value="{{$blogs->title}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                                <label>@lang('Project Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="{{ asset('public/user/img/blog/'.$blogs->image) }}" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label"> Project File Upload : </label>
                                        <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px">
                                            <div class="row">
                                               @foreach ($blogs->project_file as $element)
                                              <div class="col-md-12 mb-2">

                                                <div class="row">

                                                  <div class="col-md-5">
                                                     <a class="btn btn-success btn-sm mt-2 btn-block" href="{{ url('public/user/file/', $element->file)}}" download> Download</a>
                                                  </div>
                                                  <div class="col-md-5">
                                                     <input type="text" class="form-control" disabled="" value="{{$element->file_name}}">
                                                  </div>
                                                  <div class="col-md-2">
                                                     <a class="btn btn-danger btn-sm mt-2 btn-block" href="{{ route('get.fileDelete', $element->id) }}"><i class="fa fa-times"></i></a>
                                                  </div>
                                                  

                                                </div>
                                               
                                              </div>
                                               @endforeach
                                                <div class="col-md-12" id="planDescriptionContainer">
                                                    
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 text-right margin-top-10">
                                                    <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                          <div class="form-group col-md-12">
                              <label>@lang('Description')</label>
                              <textarea id="textAreaNiceEditor" class="form-control" name="description" rows="9">{{$blogs->description}}</textarea>
                          </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
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

@section('footerSection')

<script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
            });

              $('#batchSel').on('change',function() {

                    var batch = this.value;
                    
                  $.ajax({

                    type:"POST",
                    url:"{{ route('get.batchwise.student') }}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "batch_id" : batch,
                       
                    },
                    success:function(data){

                        $('#studentList').html(data);
                     
                    }
                });
                });
        });

        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<div class="col-md-6">'+
                '<input type="file" name="file[]" class="form-control margin-top-10">\n' +
                
                '</div>'+
                '<div class="col-md-6">'+
                '<input type="text" name="file_name[]" class="form-control margin-top-10" placeholder="File Name">\n' +

                '</div>'+
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'

            );
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    

@endsection