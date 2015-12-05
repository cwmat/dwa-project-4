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
      // Dog catch
      // Get user ID to link to blog post
      $userID = \App\User::where('name', '=', 'Maple')->pluck('id');

      // Temp blog post
      DB::table('blogs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_id' => $userID,
        'title' => 'Good catch!',
        'content' => "Click the title for more dog gifs!",
        'image' => 'http://i.imgur.com/tLcfR3A.gif',
        'link' => 'https://www.reddit.com/r/doggifs/',
      ]);

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
        'link' => '',
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
        'link' => '',
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
        'title' => "Alienware x51 Review by CNET",
        'content' => '"The affordable Alienware X51 brings innovation to slim-tower PCs by offering a full-size graphics card" however, "Despite the big 3D card, the X51s slim-tower chassis still has a limited upgrade path."',
        'image' => 'http://image.alienware.com/images/galleries/alienwarex51/gallery-shot_desktops_x51-r3_01.jpg',
        'link' => 'http://www.cnet.com/products/alienware-x51-desktop/',
      ]);
    }
}
