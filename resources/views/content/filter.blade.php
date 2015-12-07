@extends('layouts.master')

@section('title')
  Filter
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
  Filter
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        @include('errors.errors')

        <form action="/filter" method="post">
          {!! csrf_field() !!}

          {{-- Tags foreach --}}
          <fieldset class="form-group">
            <label for='tags'>Select the tags you would like to filter by</label>
            <br>
            @foreach($tagsForCheckbox as $tag_id => $tag)

              <input
              type="checkbox"
              name="tags[]"
              value="{{ $tag_id }}"> {{ $tag->name }}

              <br>

            @endforeach
          </fieldset>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
@stop
