<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Make admin user.  Will eventually be admin once I add permissions
      $user = \App\User::firstOrCreate(['email' => 'chaz@harvard.edu']);
      $user->name = 'Chaz';
      $user->email = 'chaz@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      //$user->permission = 'admin';
      $user->save();

      // Make editor user.
      $user = \App\User::firstOrCreate(['email' => 'gina@harvard.edu']);
      $user->name = 'Gina';
      $user->email = 'gina@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      //$user->permission = 'editor';
      $user->save();

      // Make poster user.
      $user = \App\User::firstOrCreate(['email' => 'maple@harvard.edu']);
      $user->name = 'Maple';
      $user->email = 'maple@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      //$user->permission = 'poster';
      $user->save();
    }
}
