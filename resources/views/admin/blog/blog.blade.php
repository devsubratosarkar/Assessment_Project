@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
          <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Project Management Create')</h2>
                </div>

                <div class="card-body">
                  @include('includes.messege')
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    
                      @csrf
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                  <div class="form-group col-md-12">
                                        <label>@lang('Select Category')</label><br>
                                        <select class="form-control" name="cat_id">
                                          @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Select Batch')</label><br>
                                        <select class="form-control" name="batch_id" id="batchSel">
                                             <option value="" selected>Select Batch</option>
                                          @foreach($batchs as $batch)
                                            <option value="{{$batch->id}}">{{ $batch->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label>@lang('Select Team Mate')</label><br>
                                    <select class="form-control js-example-basic-multiple" name="student_id[]" id="studentList" multiple>

                                    </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <label>@lang('Project Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image" required>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                              </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label"> Project File Upload : </label>
                                        <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px">
                                            <div class="row">
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
                            <textarea id="textAreaNiceEditor" class="form-control" name="description" rows="9"></textarea>
                        </div>
                        </div>
                        <div class="box-footer">
                      
                        <input type="submit" value="Submit" class="btn btn-primary btn-dark mt-2">
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

    <script type="text/javascript">
            
            $(document).ready(function () {
             
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
        </script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>

@endsection

