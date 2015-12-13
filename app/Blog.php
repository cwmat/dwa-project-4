<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  /**
   * Many to many relationship with tags.
   *
   * @return \App\Tag
   */
  public function tags()
  {
    return $this->belongsToMany('\App\Tag')->withTimestamps();;
  }

  /**
   * One to many relationship with users.
   *
   * @return \App\User
   */
  public function user()
  {
    // Blog belongs to User
    // Define an inverse one-to-many relationship.
    return $this->belongsTo('\App\User');
  }

  /**
   * Returns blog posts filtered by the tags in $tagArray.
   *
   * @param array $tagArray
   *          Array of tag ids.
   * @return \App\Blog
   */
  public function getPostsByTag($tagArray)
  {
    // Set up initial query
    $blogs = $this->query();

    // Cycle through the tag array and add orWhere clauses to the query
    foreach ($tagArray as $tagId) {
      $blogs->orWhereHas('tags', function($query) use ($tagId) {
        $query->where('tag_id', $tagId);
      });
    }

    // Get the result of the query
    $blogs = $blogs->get();

    // Return the collection of filtered blogs to be used in views/controllers
    return $blogs;
  }
}
