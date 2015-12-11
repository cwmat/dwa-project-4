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
    // dump($request->tags);
    $tagArray = [];
    if ($request->tags) {
      foreach ($request->tags as $thisTagId) {
        $tagId = (int) $thisTagId;
        array_push($tagArray, $tagId);
      }

      $blogs = \App\Blog::query();

      foreach ($tagArray as $tagId) {
        $blogs->orWhereHas('tags', function($query) use ($tagId) {
          $query->where('tag_id', $tagId);
        });
      }
      $blogs = $blogs->get();

      return view('content.filtered')->with('blogs', $blogs);
    } else {
      \Session::flash('flash_message','No filter options were selected.');
      return redirect('/filter');
    }
  }


























































    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
