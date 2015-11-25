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
          <div class="post-preview">
            <a href="post.html">
              <h2 class="post-title">
                {{ $blog->title }}
              </h2>
              @if(isset($blog->image))
                <img
                  class="img-responsive is-center"
                  src="{{ $blog->image }}"
                  alt="{{ $blog->title }}" >
              @endif
              <h3 class="post-subtitle">
                {{ $blog->content }}
              </h3>
            </a>
            <p class="post-meta">
              Posted by <a href="#"> {{ $blog->user->name }} </a> on {{ $blog->created_at }}
              <span class="edit-button">
                <a href="/blog/edit/{{$blog->id}}">
                  <button type="button" class="btn btn-default btn-sm">Edit</button>
                </a>
              </span>
            </p>
          </div>
          <hr>
        @endforeach


        <!-- Pager -->
        <ul class="pager">
          <li class="next">
            <a href="#">Older Posts &rarr;</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@stop
