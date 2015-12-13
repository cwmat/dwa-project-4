@extends('layouts.master')

@section('title')
  Make a post
@stop

@section('pre-main-styles')
  <link rel="stylesheet" href="{{ asset('bower/trumbowyg/dist/ui/trumbowyg.min.css') }}">
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
        <div id="image-container"><div id="image-preview"><h4>Image Preview</h4><h6>No image URL has been given yet.</h6></div></div>

        {{-- Yield errors from form validation TODO: Add Jquery validation here too --}}
        @include('errors.errors')

        <form action="/blog/create" method="post">
          {!! csrf_field() !!}

          <fieldset class="form-group">
            <label for="title">Title</label>
            <input
              type="text"
              class="form-control"
              name="title"
              id="title"
              maxlength="255"
              placeholder="Enter post title here"
              value="{{ old('title') }}">
          </fieldset>
          <fieldset class="form-group">
            {{-- TODO: Add image preview also fix image issue when checkbox is hit --}}
            <label for="image-link">Image Link</label>
            <input
              type="text"
              class="form-control"
              name="image-link"
              id="image-link"
              maxlength="255"
              placeholder="Paste a direct image link"
              value="{{ old('image-link') }}">
          </fieldset>
          <fieldset class="form-group">
            <label for="link">Hyperlink</label>
            <input
              type="text"
              class="form-control"
              name="link"
              id="link"
              maxlength="255"
              placeholder="Paste a hyperlink"
              value="{{ old('link') }}">
          </fieldset>
          <div id="hyper-error-container"><div id="hyper-error"></div></div>
          <fieldset class="form-group">
            <label for="content">Content</label>
            <textarea
              class="form-control"
              name="content"
              id="content"
              placeholder="Write something about your post"
              rows="5"
              >{{ old('content') }}</textarea>
          </fieldset>

          {{-- Tags foreach --}}
          <fieldset class="form-group">
            <label for="tags">Tags</label>
            <br>
            @foreach($tagsForCheckbox as $tag)
              {{-- TODO: For some reason this is working, but not as intended --}}
              <?php $resetCounter = 1; ?>

              @if($resetCounter <= 3)
                <input
                type="checkbox"
                name="tags[]"
                value= {{ $tag->id }}> {{ $tag->name }}
                <?php $resetCounter++; ?>
              @else
                <br>
                <input
                type="checkbox"
                name="tags[]"
                value= {{ $tag->id }}> {{ $tag->name }}
                <?php $resetCounter = 0; ?>
              @endif
            @endforeach
          </fieldset>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
    </div>
  </div>
@stop

@section('extra-js')
  <script src="{{ asset('bower/trumbowyg/dist/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('js/textarea.js') }}"></script>
@stop
