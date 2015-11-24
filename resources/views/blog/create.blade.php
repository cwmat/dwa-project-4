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
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        <form action="/blog/create" method="post">
          {!! csrf_field() !!}

          <fieldset class="form-group">
            <label for="title">Title</label>
            <input
              type="text"
              class="form-control"
              name="title"
              id="title"
              placeholder="Enter post title here"
              value= {{ old('title') }}>
          </fieldset>
          <fieldset class="form-group">
            <label for="image-link">Image Link</label>
            <input
              type="text"
              class="form-control"
              name="image-link"
              id="image-link"
              placeholder="Paste a direct image link"
              value= {{ old('image-link') }}>
          </fieldset>
          <fieldset class="form-group">
            <label for="post-content">Content</label>
            <textarea
              class="form-control"
              name="post-content"
              id="post-content"
              placeholder="Write something about your post"
              rows="5"
              >{{ old('post-content') }}</textarea>
          </fieldset>

          {{-- Tags foreach --}}
          <fieldset class="form-group">
            <label for="post-tags">Image Link</label>
            <br>

              @foreach($tags as $tag)
                {{-- Reset col every three tags --}}
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


            {{-- <input
              type="button"
              class="btn btn-info btn-xs"
              name="post-tags"
              id="post-tags"
              value="Tag Name 1">
            <input
              type="button"
              class="btn btn-info btn-xs"
              name="post-tags"
              id="post-tags"
              value="Tag Name 2">
            <input
              type="button"
              class="btn btn-info btn-xs"
              name="post-tags"
              id="post-tags"
              value="Tag Name 3"> --}}
          </fieldset>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
    </div>
  </div>
@stop
