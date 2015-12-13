@extends('layouts.master')

@section('title')
  Main Content
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-image')
  {{ asset('images/src/images.png') }}
@stop

@section('hero-heading')
  Micro Blog
@stop

@section('hero-sub-heading')
  Testing the creation of a micro blog
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        {{-- Cycle through each blog post and post here --}}
        @foreach($blogs as $blog)
          @include('content.blog_post')
        @endforeach
      </div>
    </div>
  </div>
@stop
