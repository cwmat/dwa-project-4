<?php

namespace App\Http\Middleware;

use Closure;

class AuthEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if(auth()->check()){
        // Pull the blog ids for the current user
        $blogsIds = auth()->user()->getBlogPostIds();
        // Parse the id from the URL - requires the path to have only 1 integer that corresponds to the blog id
        $requestId = (int) preg_replace('/\D/', '', $request->path());

        // Check that the blog post actually exists
        $blog = \App\Blog::find($requestId);

        // If it does not, send to the mian page
        if(is_null($blog)) {
          \Session::flash('flash_message','Blog post not found.');
          return redirect('/');
        }

        // If the current user is the OP or if they are an admin (1) or editor (2) they may edit the post
        if (in_array($requestId, $blogsIds) || auth()->user()->role <= 2) {
          return $next($request);
        } else {
          // User does not have the privaleges and/or is not the OP
          \Session::flash('flash_message','You are not authorized to do that.');
          return redirect('/');
        }
      }
      // No user is logged in
      \Session::flash('flash_message','You must be logged in to edit.');
      return redirect('/auth/login');
    }
}
