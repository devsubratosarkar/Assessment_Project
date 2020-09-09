<!DOCTYPE html>
<html>
<head>
    <title>@lang('Email For Blog')</title>
</head>
<body>
    <h1>{{ $user['subject'] }}</h1>
    <p>{{ $user['message'] }}</p>
    <p>@lang('Thank you')</p>
</body>
</html>