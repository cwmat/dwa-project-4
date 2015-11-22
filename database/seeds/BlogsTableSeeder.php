<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Cats
      // Get user ID to link to blog post
      $userID = \App\User::where('name', '=', 'Gina')->pluck('id');

      // Temp blog post
      DB::table('blogs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $userID,
        'title' => 'Check out this neat cat!',
        'content' => "Don't you just want to squish its face?!",
        'image' => 'https://i.imgur.com/k3lHKZP.jpg',
      ]);


      // Funny
      // Get user ID to link to blog post
      $userID = \App\User::where('name', '=', 'Chaz')->pluck('id');

      // Temp blog post
      DB::table('blogs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $userID,
        'title' => "Sweet moves!",
        'content' => 'Wow, this guy looks guy looks totally crazed!',
        'image' => 'http://ak-hdl.buzzfed.com/static/2014-07/9/6/enhanced/webdr08/anigif_enhanced-5601-1404900076-6.gif',
      ]);


      // Technology
      // Get user ID to link to blog post
      $userID = \App\User::where('name', '=', 'Chaz')->pluck('id');

      // Temp blog post
      // https://www.reddit.com/r/technology/comments/3tt2bl/blizzard_entertainment_has_obtained_the_source/
      DB::table('blogs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $userID,
        'title' => "Blizzard 'stole' our source code, BOT maker says",
        'content' => 'Blizzard Entertainment has obtained the source code of the popular Heroes of Storm cheating bot Stormbuddy. Facing a million dollar copyright infringement lawsuit, a freelance developer reportedly struck a deal with Blizzard.',
        'image' => 'https://torrentfreak.com/images/stormbuddy.jpg',
      ]);
    }
}
