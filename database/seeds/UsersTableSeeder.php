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
      // Make admin user (1).  Will eventually be admin once I add permissions
      $user = \App\User::firstOrCreate(['email' => 'chaz@harvard.edu']);
      $user->name = 'Chaz';
      $user->email = 'chaz@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      $user->role = 1;
      $user->save();

      // Make editor user (2).
      $user = \App\User::firstOrCreate(['email' => 'gina@harvard.edu']);
      $user->name = 'Gina';
      $user->email = 'gina@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      $user->role = 2;
      $user->save();

      // Make poster user (3).
      $user = \App\User::firstOrCreate(['email' => 'maple@harvard.edu']);
      $user->name = 'Maple';
      $user->email = 'maple@harvard.edu';
      $user->password = \Hash::make('123fakestreet');
      $user->role = 3;
      $user->save();
    }
}
