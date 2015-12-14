@extends('layouts.master')

@section('title')
  Delete a post
@stop

@section('pre-main-styles')

@stop

@section('hero-heading')
  Brain Break
@stop

@section('hero-sub-heading')
  Are you sure you want to delete this post?
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="post-preview">
          {{-- Blog post title --}}
          {{-- Check if link url exists then add link to title --}}
          @if(isset($blog->link) && strlen($blog->link) > 0)
            <a href="{{ $blog->link }}" target="_blank">
          @endif

          <h2 class="post-title">
            {{ $blog->title }}
          </h2>

          {{-- Check if image url exists then post it --}}
          @if(isset($blog->image) && strlen($blog->image) > 0)
            <img
              class="img-responsive is-center"
              src="{{ $blog->image }}"
              alt="{{ $blog->title }}" >
          @endif

          {{-- Close anchor tag so image (if it exists) is in the link --}}
          @if(isset($blog->link) && strlen($blog->link) > 0)
            </a>
          @endif

          {{-- Blog post content --}}
          <p class="blog-content">
            {{ $blog->content }}
          </p>

          {{-- Blog post created/posted by --}}
          <p class="post-meta">
            Posted by <a href="#"> {{ $blog->user->name }} </a> on {{ $blog->created_at }}
          </p>

          <hr>

          <a href="/blog/delete/{{ $blog->id }}" class="btn btn-default">Yes</a>
          <a href="/" class="btn btn-default">No</a>
        </div>
      </div>
    </div>
  </div>
@endsection
