@extends('layouts.master')

@section('title')
  Register
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-image')
  {{ asset('images/src/images.png') }}
@stop

@section('hero-heading')
  Register Page
@stop

@section('hero-sub-heading')
  Do some registering stuff
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p>Already have an account? <a href='/auth/login'>Login here...</a></p>

        <h1>Register</h1>

        @if(count($errors) > 0)
          <ul class='errors'>
            @foreach ($errors->all() as $error)
              <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <form method='POST' action='/auth/register'>
          {!! csrf_field() !!}

          <div class='form-group'>
            <label for='name'>Name</label>
            <input
            type='text'
            name='name'
            id='name'
            value='{{ old('name') }}'>
          </div>

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
            id='password'>
          </div>

          <div class='form-group'>
            <label for='password_confirmation'>Confirm Password</label>
            <input
            type='password'
            name='password_confirmation'
            id='password_confirmation'>
          </div>

          <button type='submit' class='btn btn-primary'>Register</button>

        </form>
      </div>
    </div>
  </div>
@stop
