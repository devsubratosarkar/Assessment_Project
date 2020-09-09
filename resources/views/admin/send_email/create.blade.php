@extends('admin.layouts.app')
@section('main-content')
<div class="container">
   <div class="content-wrapper">

      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">
                        <i class="fa fa-envelope"></i>  @lang('Send email to')  
                     </div>
                  </div>
                  <div class="card-body">
                     @include('includes.messege')
                     <form action="{{ route('send_email.sendEmail') }}" method="post">
                        @csrf
                        <div class="row uppercase">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-12"><strong>@lang('SUBJECT')</strong></label>
                                 <div class="col-md-12">
                                    <input class="form-control input-lg" name="subject" type="text" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br><br>
                        <div class="row uppercase">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-12"><strong>@lang('Message')</strong> @lang('NB: EMAIL WILL SENT USING EMAIL TEMPLATE')</label>
                                 <div class="col-md-12">
                                    <textarea name="message" rows="10" class="form-control" id="shaons"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br><br>
                        <div class="row uppercase">
                           <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn-sm btn-dark mt-2"> @lang('Submit') </button>
                           </div>
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