@extends('layouts.master')

@section('meta')
    <title>Login Page</title>
@endsection

@section('content')
    <body class="cyan">
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Login</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="username" type="text">
                        <label for="username" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input type="checkbox" id="remember-me" />
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <a href="index.html" class="btn waves-effect waves-light col s12">Login</a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="page-register.html">Contact Now to Get Enroll!</a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </body>

@endsection