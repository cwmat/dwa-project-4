<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function blogs()
  {
    return $this->belongsToMany('\App\Blog')->withTimestamps();;
  }

  public function getTagsForCheckboxes()
  {
    $tags = $this->orderBy('name','ASC')->get();

    $tagsForCheckboxes = [];

    foreach($tags as $tag) {
      $tagsForCheckboxes[$tag['id']] = $tag;
    }

    return $tagsForCheckboxes;
  }
}
