<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getIndex()
  {
    // Query blog posts and order by updated at timestamp
    $blogs = \App\Blog::with('user')->orderBy('updated_at','DESC')->get();

    return view('content.content')->with('blogs', $blogs);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getFilter()
  {
    $tagModel = new \App\Tag();
    $tagsForCheckbox = $tagModel->getTagsForCheckboxes();

    return view('content.filter')->with('tagsForCheckbox', $tagsForCheckbox);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function postFilter(Request $request)
  {
    // Unpack tag ids from request
    $tagArray = [];
    if ($request->tags) {
      foreach ($request->tags as $thisTagId) {
        $tagId = (int) $thisTagId;
        array_push($tagArray, $tagId);
      }

      // Call blog model to get specified posts by tag id
      $blogModel = new \App\Blog();
      $blogs = $blogModel->getPostsByTag($tagArray);

      return view('content.filtered')->with('blogs', $blogs);
    } else {
      \Session::flash('flash_message','No filter options were selected.');
      return redirect('/filter');
    }
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getUser()
    {
      // Get blog posts by user id
      $blogs = \App\Blog::where('user_id', '=', auth()->user()->id)->get();
      return view('content.filtered')->with('blogs', $blogs);
    }
}
