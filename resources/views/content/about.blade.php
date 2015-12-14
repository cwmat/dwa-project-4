@extends('layouts.master')

@section('title')
  About
@stop

@section('head')
  {{-- Stylesheets ? --}}
@stop

@section('hero-heading')
  Brain Break
@stop

@section('hero-sub-heading')
  About This Website
@stop

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p>
          The goal of this project was to create a Laravel based/database driven web application that included examples of all four CRUD operations.  I decided to implement these requirements by creating a simple micro-blogging application.
        </p>
        <p>
          The purpose of this application is to provide a platform to share quick 'bits' of information and is modeled after other micro blogging platforms such tumblr, blogger, reddit, buzzfeed, and so on.  It does not necessarily add anything to the micro blogging platform as a whole but was an exercise for me to learn some of the underlying nuts and bolts of such an application.  Content comes in several forms including text, images, gifs, and hyperlinks.  The user is free to post whatever content they desire as long as there is at least a title to the post.
        </p>
        <p>
          The application utilizes a roles and permissions system containing three main roles: admin, editor, and user (also there is an implicit guest user that is not stored in the database).  A "guest" that visits the site without logging in will be able to view content on the main page and filter by tags.  A guest may then register to become a "User" and login to make blog posts and also has the capability to edit their own posts.  The site owner is given the role of "Admin" and has several extra capabilities such as access to an admin panel that allows for chaning user roles, deleting posts, and editing posts that are not their own.  Admins are able to appoint other admins and editors.  "Editors" have essentially the same abilities as the admins but without access to the admin panel.
        </p>
        <p>
          Have fun posting some content!
        </p>
      </div>
    </div>
  </div>
@stop
