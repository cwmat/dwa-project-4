@extends('layouts.master')

@section('title')
  Edit a post
@stop

@section('pre-main-styles')
  <link rel="stylesheet" href="{{ asset('bower/trumbowyg/dist/ui/trumbowyg.min.css') }}">
@stop

@section('hero-image')
  {{ asset('images/src/images.png') }}
@stop

@section('hero-heading')
  Brain Break
@stop

@section('hero-sub-heading')
  Edit a Blog Post
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div id="image-container"><div id="image-preview"><h4>Image Preview</h4><h6>No image URL has been given yet.</h6></div></div>

        @include('errors.errors')

        <form action="/blog/edit" method="post">
          {!! csrf_field() !!}

          {{-- Hidden field to hold post id --}}
          <input type='hidden' name='id' value='{{ $blog->id }}'>

          <fieldset class="form-group">
            <label for="title">Title</label>
            <input
              type="text"
              class="form-control"
              name="title"
              id="title"
              maxlength="255"
              placeholder="Enter post title here"
              value="{{ old('title', $blog->title) }}">
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
              value="{{ old('image-link', $blog->image) }}">
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
              value="{{ old('image-link', $blog->link) }}">
            <div id="hyper-error-container"><div id="hyper-error"></div></div>
          </fieldset>
          <fieldset class="form-group">
            <label for="content">Content</label>
            <textarea
              class="form-control"
              name="content"
              id="content"
              placeholder="Write something about your post"
              rows="5"
              >{{ old('content', $blog->content) }}</textarea>
          </fieldset>

          {{-- Tags foreach --}}
          <fieldset class="form-group">
            <label for='tags'>Tags</label>
            <br>
            @foreach($tagsForCheckbox as $tag_id => $tag)
              {{-- TODO: For some reason this is working, but not as intended --}}
              <?php
              $resetCounter = 1;
              ?>
              {{-- Check which tags should be pre-checked --}}
              {{ $checked = (in_array($tag->name, $tagsForThisBlog)) ? 'checked' : '' }}

              @if($resetCounter <= 3)
                <input
                {{ $checked }}
                type="checkbox"
                name="tags[]"
                value="{{ $tag_id }}"> {{ $tag->name }}
                <?php $resetCounter++; ?>
              @else
                <br>
                <input
                {{ $checked }}
                type="checkbox"
                name="tags[]"
                value="{{ $tag_id }}"> {{ $tag->name }}
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
