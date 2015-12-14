@extends('layouts.master')

@section('title')
  Main Content
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-heading')
  Brain Break
@stop

@section('hero-sub-heading')
  Here are the Filtered Posts
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
