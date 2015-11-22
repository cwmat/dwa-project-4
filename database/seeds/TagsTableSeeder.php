<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Initial tags
      $initialTags = ['food', 'funny', 'animals', 'news', 'games', 'movies', 'science', 'sports', 'music', 'books', 'technology', 'gif', 'video', 'text', 'image'];

      // Cycle through initial tag names and add them to the tags table
      foreach ($initialTags as $tagName) {
        $tag = new \App\Tag();
        $tag->name = $tagName;
        $tag->save();
      }
    }
}
