<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Initial tags
      // Level 1: admin, Level 2: editor, Level 3: user
      $initialRoles = [1, 2, 3];

      // Cycle through initial role levels and add them to the roles table
      foreach ($initialRoles as $roleLevel) {
        $role = new \App\Role();
        $role->name = $roleLevel;
        $role->save();
      }
    }
}
