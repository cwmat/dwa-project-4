<?php

use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Array key is the blog title, value is an array of desired tags
      $blogs = [
        "Alienware x51 Review by CNET" => [
          'news',
          'technology',
          'games',
          'text',
        ],
        "Sweet moves!" => [
          'funny',
          'gif',
        ],
        "Check out this neat cat!" => [
          'animals',
          'image',
        ],
        "Good catch!" => [
          'animals',
          'gif',
        ],
      ];

      // Loop through blogs array and create pivot table rows
      foreach ($blogs as $title => $tags) {
        // Query the blog post
        $blog = \App\Blog::where('title', 'like', $title)->first();

        // Loop through tags and add to pivot
        foreach ($tags as $tagName) {
          $tag = \App\Tag::where('name', 'like', $tagName)->first();

          $blog->tags()->save($tag);
        }
      }
    }
}
