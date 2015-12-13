<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * Many to many relationship with blogs.
   *
   * @return \App\Blog
   */
  public function blogs()
  {
    return $this->belongsToMany('\App\Blog')->withTimestamps();;
  }

  /**
   * Returns an array of tags to be used for checkboxes.
   *
   * @return array of \App\Tag
   */
  public function getTagsForCheckboxes()
  {
    // Query tags
    $tags = $this->orderBy('name','ASC')->get();

    // Setup array for tag ids and names; cycle through tags and add to array
    $tagsForCheckboxes = [];
    foreach($tags as $tag) {
      $tagsForCheckboxes[$tag['id']] = $tag;
    }

    // Return array of tag ids and names
    return $tagsForCheckboxes;
  }
}
