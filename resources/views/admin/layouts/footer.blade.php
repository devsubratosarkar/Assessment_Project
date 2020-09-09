@php 
$general = App\Model\User\general::first();
@endphp
        <footer class="sticky-footer bg-white">
           <div class="container my-auto">
              <div class="copyright text-center my-auto">
                 <span>{!! $general->admin_footer !!}</span>
              </div>
           </div>
        </footer>
       </div>
     </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('Ready to Leave ?')</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">{{auth()->guard('admin')->user()->name}}</span>
          </button>
        </div>
        <div class="modal-body">@lang('Select') <b>@lang('Logout')</b> @lang('below if you are ready to end your current session.')</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang('Cancel')</button>
          <a class="btn btn-primary" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">@lang('Logout')</a>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
          {{ csrf_field()}}
        </form>
      </div>
    </div>
  </div>


  <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>

  
  <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <script src="{{ asset('public/admin/js/admin-main.min.js') }}"></script>
 
  <script src="{{ asset('public/admin/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/typeahead.bundle.js') }}"></script>
  <script src="{{ asset('public/admin/js/event.js') }}"></script>
  <script src="{{ asset('public/admin/js/custom.js') }}"></script>

 <script src="{{ asset('public/admin/nicEdit/nicEdit.js')}}" type="text/javascript"></script>

 <script src="{{ asset('public/admin/select/dist/js/select2.min.js')}}"></script>

 <script>bkLib.onDomLoaded(function () {
        new nicEditor({ iconsPath: '{{ asset('public/admin/nicEdit/nicEditorIcons.gif')}}' }).panelInstance('textAreaNiceEditor');
    });</script>
 

  <script>
function myFunction() {
  document.getElementById("myForm").submit();
}
</script>
            


  @section('footerSection')

  @show