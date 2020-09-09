@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>@lang('Sub Menu Edit')</h2>
                </div>
               <div class="card-body">
                  @include('includes.messege')
                  <form action="{{ route('sub_menu.update',$sub_menus->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                               <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                  <div class="form-group col-md-12">
                                        <label>@lang('Select Menu')</label><br>
                                        <select class="form-control"  name="menu_id">
                                          @foreach($menus as $menu)
                                            <option value="{{$menu->id}}"
                                             
                                                @if ($sub_menus->menu_id == $menu->id)
                                                  selected
                                                @endif
                                             
                                              >{{ $menu->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  <div class="form-group col-md-12">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" name="name" value="{{$sub_menus->name}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title" value="{{$sub_menus->title}}" required>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('Sub-Menu Image') <small>(@lang('PNG format is standard'))</small></label>
                                <input type="file" id="dvd_image" class="form-control" name="image">
                                <div class="row mt-2">
                                    <div class="form-group col-md-12">
                                      <div class="preview hide">
                                        <img id="dvd_image" align="middle" src="{{ asset('public/user/img/sub_menu/'.$sub_menus->image) }}" class="image_to_upload"/>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          <div class="form-group col-md-12">
                              <label>@lang('Description')</label>
                              <textarea id="textAreaNiceEditor" class="form-control" name="description" rows="9">{{$sub_menus->description}}</textarea>
                          </div>

                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2">@lang('Update')</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
   </div>
</div>
@endsection