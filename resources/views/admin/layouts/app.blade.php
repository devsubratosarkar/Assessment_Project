<!DOCTYPE html>
<html lang="en">
   <head>
      @include('admin.layouts.head')
   </head>
   <body id="page-top">
      <div id="wrapper">
        @include('admin.layouts.sidebar')
      	@include('admin.layouts.header')
        @section('main-content')
        @show
      </div>
        @include('admin.layouts.footer')

       {{--  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> --}}
   </body>
</html>

