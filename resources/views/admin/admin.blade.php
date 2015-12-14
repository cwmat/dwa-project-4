@extends('layouts.master')

@section('title')
  Admin Panel
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-heading')
  Brain Break
@stop

@section('hero-sub-heading')
  Admin Panel
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        @include('errors.errors')
        <form action="/admin-panel" method="post">
          {!! csrf_field() !!}

          @foreach($allUsers as $thisUser)
          <fieldset class="form-group">
            <label for="title">
              <span class="admin-panel-user-highlight">{{ $thisUser->name }}'s</span> role is currently set to:
            </label>
            <select
            class="form-control"
            name="{{ $thisUser->id }}"
            id="{{ $thisUser->id }}">
            {{-- Remove choices from the current user so that Admin is the only possible option --}}
            @if($user->id == $thisUser->id)
              <option value=1 selected>Admin</option>
            @else
              <option
              value=1
              {{ $selected = ($thisUser->role == 1) ? 'selected' : '' }}>Admin</option>
              <option
              value=2
              {{ $selected = ($thisUser->role == 2) ? 'selected' : '' }}>Editor</option>
              <option
              value=3
              {{ $selected = ($thisUser->role == 3) ? 'selected' : '' }}>User</option>
            @endif
            </select>
          </fieldset>
          @endforeach

          <button type="submit" class="btn btn-default">Update Roles</button>

        </form>

      </div>
    </div>
  </div>
@stop
