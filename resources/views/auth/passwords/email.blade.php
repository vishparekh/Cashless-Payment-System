@extends('layouts.master')

@section('meta')
  <title>Reset Password Page</title>
@endsection

@section('content')
    <body class="cyan">
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}
        <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
          <div class="input-field col s12 center">
            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Reset Password</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" value="{{ old('email') }}" name="email">
            <label for="username" class="center-align">Email</label>
          </div>
        </div>
        
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn btn-primary">
                                    Submit me Link
                                </button>
          </div>
        </div>
        <div class="row">  
        </div>

      </form>
    </div>
  </div>
</body>

@endsection
