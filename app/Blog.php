<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public function tags()
  {
    return $this->belongsToMany('\App\Tag')->withTimestamps();;
  }

  public function user() {
    # Blog belongs to User
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('\App\User');
  }
}
