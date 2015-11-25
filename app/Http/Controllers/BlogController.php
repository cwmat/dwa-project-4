<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex()
  {
    return redirect("/");
  }

  /**
   * Display the edit page.
   *
   * @return \Illuminate\Http\Response
   */
  public function getCreate()
  {
    $tags = \App\Tag::orderBy('name','ASC')->get();

    return view("blog.create")->with('tags', $tags);
  }

  /**
   * Post to the create page.
   *
   * @return \Illuminate\Http\Response
   */
  public function postCreate(Request $request)
  {
    // Query tag list
    $tags = \App\Tag::orderBy('name','ASC')->get();

    // Validate form fields
    $this->validate(
      $request,
      [
        'title' => 'required|min:1|max:255',
        'image' => 'max:255|url',
        'content' => 'max:4294967295',
        // 'tags' => 'required|min:4',
      ]
    );

    // Add entry to the database
    $blog = new \App\Blog();
    $blog->title = $request->title;
    $blog->image = $request->input("image-link");
    $blog->content = $request->content;
    $blog->user_id = 1;

    // Commit to database
    $blog->save();

    // Cycle through tags and commit ones that were clicked to the database
    foreach ($tags as $tag) {
      // Check if a tag in the database matches one checked in the request
      $requestTag = $request->input($tag->name);
      $outcome = isset($requestTag);

      if (isset($requestTag)) {
        // echo $tag->name;
        // echo "<br>";
        // TODO: Add code here that will commit to the DB
      }
    }

    // Send flash message to destination
    \Session::flash('flash_message','Your post was added!');

    return(redirect("/"));
  }

  /**
   * Display the edit page.
   *
   * @return \Illuminate\Http\Response
   */
  public function getEdit()
  {
    return view("blog.edit");
  }

  /**
   * Post to the edit page.
   *
   * @return \Illuminate\Http\Response
   */
  public function postEdit(Request $request)
  {
    return("you made it to the post edit page");
  }







































    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
