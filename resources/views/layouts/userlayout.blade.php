@extends('layouts.master')

@section('content')
    <aside id="left-sidebar-nav">
        @include('sidebars.main')
    </aside>
    @yield('right-sidebar')

    <aside id="right-sidebar-nav">
    </aside>

@endsection