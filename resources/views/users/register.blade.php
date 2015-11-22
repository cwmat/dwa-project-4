@extends('layouts.master')
{{-- For now.  I will want this to have its own master template that is more plain and doesn't have a big hero image --}}

@section('title')
  Register
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-image')
  {{ asset('images/hero-register.jpg') }}
@stop

@section('hero-heading')
  Register Page
@stop

@section('hero-sub-heading')
  Do some registering stuff
@stop

@section('main-content')
  Made it to the register page!
@stop
