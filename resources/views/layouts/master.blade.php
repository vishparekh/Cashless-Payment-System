<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('meta')
    {{--<style>--}}
        {{--.right-0 {--}}
            {{--right:0 !important;--}}
            {{--height:100% !important;--}}

            {{--left:initial !important;--}}
            {{--top: 64px !important;--}}
            {{--width: 344px !important;--}}
        {{--}--}}
        {{--#chart-dashboard {--}}

            {{--padding-bottom: 60px;--}}
        {{--}--}}
        {{--ul.category_button{--}}
            {{--list-style-type:none;--}}
            {{--white-space:nowrap;--}}
            {{--overflow-x:auto;--}}
            {{--padding:20px 0--}}
        {{--}--}}
        {{--.rightside-navigation {--}}
            {{--overflow: auto !important;--}}
        {{--}--}}
        {{--ul.category_button li{--}}
            {{--display:inline;--}}
        {{--}--}}
        {{--.chat-out-list {--}}
            {{--padding:10px 0 !important;--}}
        {{--}--}}
        {{--footer.page-footer {--}}
            {{--padding-top: 0px;--}}
            {{--position: fixed;--}}
            {{--bottom: 0;--}}
            {{--width: 100%;--}}
            {{--z-index: 9;--}}
        {{--}--}}
        {{--#main, footer {--}}
            {{--padding: 0 !important;--}}
        {{--}--}}
        {{--.side-nav{--}}
            {{--top: 65px !important;--}}
        {{--}--}}
    {{--</style>--}}
    @yield('styles')
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    <div id="main">
        <div class="wrapper">
            @yield('content')
        </div>
    </div>
    @include('includes.scripts')
    @yield('scripts')
    {{--@include('includes.footer')--}}
</body>
</html>