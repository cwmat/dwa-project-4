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
    // Get all the possible tags so we can include them with checkboxes in the view
    $tagModel = new \App\Tag();
    $tagsForCheckbox = $tagModel->getTagsForCheckboxes();

    return view("blog.create")->with('tagsForCheckbox', $tagsForCheckbox);
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
        'link' => 'max:255|url',
        'content' => 'max:4294967295',
      ]
    );

    // Add entry to the database
    $blog = new \App\Blog();
    $blog->title = $request->title;
    $blog->image = $request->input("image-link");
    $blog->link = $request->link;
    $blog->content = $request->content;
    $blog->user_id = auth()->user()->id;

    // Commit to database
    $blog->save();

    // Commit tags to DB
    if($request->tags) {
      $tags = $request->tags;
    }
    else {
      $tags = [];
    }
    $blog->tags()->sync($tags);



    // Send flash message to destination
    \Session::flash('flash_message','Your post was added!');

    return(redirect("/"));
  }

  /**
   * Display the edit page.
   *
   * @return \Illuminate\Http\Response
   */
  public function getEdit($id = null)
  {
    // Retreive blog and tags using the id from the url
    $blog = \App\Blog::with('tags')->find($id);

    // Get all the possible tags so we can include them with checkboxes in the view
    $tagModel = new \App\Tag();
    $tagsForCheckbox = $tagModel->getTagsForCheckboxes();

    /*
    Create a simple array of just the tag names for tags associated with this blog;
    will be used in the view to decide which tags should be checked off
    */
    $tagsForThisBlog = [];
    foreach($blog->tags as $tag) {
        $tagsForThisBlog[] = $tag->name;
    }

    // Return the edit view and pass the blog post obj and tags with it
    return view("blog.edit")->with([
      'blog' => $blog,
      'tagsForCheckbox' => $tagsForCheckbox,
      'tagsForThisBlog' => $tagsForThisBlog,
    ]);
  }

  /**
   * Post to the edit page.
   *
   * @return \Illuminate\Http\Response
   */
  public function postEdit(Request $request)
  {
    // Validate form fields
    $this->validate(
      $request,
      [
        'title' => 'required|min:1|max:255',
        'image' => 'max:255|url',
        'link' => 'max:255|url',
        'content' => 'max:4294967295',
      ]
    );

    // Add entry to the database
    $blog = \App\Blog::find($request->id);
    $blog->title = $request->title;
    $blog->image = $request->input("image-link");
    $blog->link = $request->link;
    $blog->content = $request->content;

    // Commit to DB
    $blog->save();

    // Commit tags to DB
    if($request->tags) {
      $tags = $request->tags;
    }
    else {
      $tags = [];
    }
    $blog->tags()->sync($tags);

    // Send flash message to destination
    \Session::flash('flash_message','Your post was updated!');

    return(redirect("/"));
  }

  /**
   * Confrim deletion.
   *
   * @return \Illuminate\Http\Response
   */
  public function getConfirmDelete($blog_id = null)
  {
    $blog = \App\Blog::find($blog_id);

    // If it does not, send to the mian page
    if(is_null($blog)) {
      \Session::flash('flash_message','Blog post not found.');
      return redirect('/');
    }

    return view('blog.delete')->with('blog', $blog);
  }

  /**
   * Process deletion.
   *
   * @return \Illuminate\Http\Response
   */
  public function getDelete($blog_id = null)
  {
    // Get the blog to be deleted
    $blog = \App\Blog::find($blog_id);

    // If it does not, send to the mian page
    if(is_null($blog)) {
      \Session::flash('flash_message','Blog post not found.');
      return redirect('/');
    }

    // Remove tags associated with this blog
    if($blog->tags()) {
        $blog->tags()->detach();
    }

    // Delete the blog
    $blog->delete();

    // Redirect to main page with a flash message
    \Session::flash('flash_message',$blog->title.' was deleted.');
    return redirect('/');
  }

}
