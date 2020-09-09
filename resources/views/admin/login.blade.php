<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@lang('Admin Login')</title>

  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/css/css.css') }}" rel="stylesheet">

  <link href="{{ asset('public/admin/css/admin-main.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div id="login-container">
        <div id="login-panel">
            <h3>@lang('Admin Login')</h3>
            @include('includes.messege')
            <form action="{{ route('admin.login') }}" method="post">
              @csrf
                <div class="login-input">
                    <input type="email" name="email" id="" placeholder="Email Address" />
                </div>
                <div class="login-input">
                    <input type="password" name="password" id="" placeholder="Password" />
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me">
                    <label class="form-check-label" for="remember-me">@lang('Remember me')</label>
                </div>
                <div class="login-input">
                    <button type="submit">@lang('Login')</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/event.js') }}"></script>

</body>
</html>
