<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('meta')
    @include('includes.head')
    <link href="{{ URL::to('css/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    @yield('styles')
</head>
<body>
@yield('content')
@include('includes.scripts')
@yield('scripts')
</body>
</html>

