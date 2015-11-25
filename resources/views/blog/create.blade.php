@extends('layouts.master')

@section('title')
  Make a post
@stop

@section('head')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
@stop

@section('hero-image')
  {{ asset('images/src/images.png') }}
@stop

@section('hero-heading')
  Micro Blog
@stop

@section('hero-sub-heading')
  Make a post
@stop

@section('main-content')
  @include('blog.forms')

  {{-- Set the form action --}}
  @section('action')
    /blog/create
  @stop

  {{-- Set title field value --}}
  @section('title-value')
    {{ old('title') }}
  @stop

  {{-- Set image field value --}}
  @section('image-value')
    {{ old('image-link') }}
  @stop

  {{-- Set content field value --}}
  @section('content-value')
    squish
  @stop

  {{-- Loop through tags and create checkboxes for them --}}
  @section('tag-boxes')
    @foreach($tags as $tag)
      {{-- TODO: For some reason this is working, but not as intended --}}
      <?php $resetCounter = 1; ?>

      @if($resetCounter <= 3)
        <input
        type="checkbox"
        name= {{ $tag->name }}
        value= {{ $tag->name }}> {{ $tag->name }}
        <?php $resetCounter++; ?>
      @else
        <br>
        <input
        type="checkbox"
        name= {{ $tag->name }}
        value= {{ $tag->name }}> {{ $tag->name }}
        <?php $resetCounter = 0; ?>
      @endif
    @endforeach
  @stop
@stop
