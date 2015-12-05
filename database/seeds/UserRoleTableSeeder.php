<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      {
        // Array key is the user name, value is the role level
        $userRoles = [
          'Chaz' => 1, // admin
          'Gina' => 2, // editor
          'Maple' => 3, // user
        ];

        // Loop through users array and create pivot table rows
        foreach ($userRoles as $userName => $roleLevel) {
          // Query the user
          $user = \App\User::where('name', '=', $userName)->first();

          // Query the role level
          $level = \App\Role::where('level', '=', $roleLevel)->first();

          // Save to database
          $user->roles()->save($level);

        }
      }
    }
}
