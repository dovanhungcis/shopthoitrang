@extends('layouts.login')

@section('title', 'Đăng nhập')
@section('content')

  <form class="form-signin" action="{{ route('post.login') }}" method="post">
    @if(session('err'))
      <div class="alert alert-warning" role="alert">{{ session('err') }}</div>
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h2 class="form-signin-heading">Please sign in</h2>
    <div class="form-group {{ ($errors->first('email'))?'has-error':'' }}">
      <label for="email" class="sr-only">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email address" autofocus="autofocus" />
      @if($errors->first('email'))
      <p class="text-danger">{{$errors->first('email')}}</p>
      @endif
    </div>
    <div class="form-group {{ ($errors->first('password'))?'has-error':'' }}">
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" />
      @if($errors->first('password'))
      <p class="text-danger">{{$errors->first('password')}}</p>
      @endif
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember" value="1"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

@stop
