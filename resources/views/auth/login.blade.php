@extends('layouts.master')

@section('title')
  Login
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-image')
  {{ asset('images/src/images.png') }}
@stop

@section('hero-heading')
  Login Page
@stop

@section('hero-sub-heading')
  Do some logging in stuff
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p>Don't have an account? <a href='/auth/register'>Register here...</a></p>

        <h1>Login</h1>

        @if(count($errors) > 0)
          <ul class='errors'>
            @foreach ($errors->all() as $error)
              <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <form method='POST' action='/auth/login'>

          {!! csrf_field() !!}

          <div class='form-group'>
            <label for='email'>Email</label>
            <input
            type='text'
            name='email'
            id='email'
            value='{{ old('email') }}'>
          </div>

          <div class='form-group'>
            <label for='password'>Password</label>
            <input
            type='password'
            name='password'
            id='password'
            value='{{ old('password') }}'>
          </div>

          <div class='form-group'>
            <input
            type='checkbox'
            name='remember'
            id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
          </div>

          <button type='submit' class='btn btn-primary'>Login</button>

        </form>
      </div>
    </div>
  </div>
@stop
