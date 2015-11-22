@extends('layouts.master')
{{-- For now.  I will want this to have its own master template that is more plain and doesn't have a big hero image --}}

@section('title')
  Login
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-image')
  {{ asset('images/hero-login.jpg') }}
@stop

@section('hero-heading')
  Login Page
@stop

@section('hero-sub-heading')
  Do some logging in stuff
@stop

@section('main-content')
  Made it to the login page!
@stop
