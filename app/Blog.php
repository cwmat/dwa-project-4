<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public function tags()
  {
    return $this->belongsToMany('\App\Tag')->withTimestamps();;
  }

  public function user()
  {
    # Blog belongs to User
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('\App\User');
  }

  public function getPostsByTag($tagArray)
  {
    $blogs = $this->query();

    foreach ($tagArray as $tagId) {
      $blogs->orWhereHas('tags', function($query) use ($tagId) {
        $query->where('tag_id', $tagId);
      });
    }
    $blogs = $blogs->get();

    return $blogs;
  }
}
