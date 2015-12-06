<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminPanel()
    {
      $allUsers = \App\User::orderBy('name', 'ASC')->get();

      return view('admin.admin')->with('allUsers', $allUsers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUpdateRoles(Request $request)
    {
      // Cycle through request to get user IDs from selection form
      foreach ($request->input() as $userId => $role) {
        // Casting the array key to int yields the integer version of the selection option value.  Strings return as 0, hence the > 0 clause (removes string array keys)
        if ((int) $userId > 0) {
          $thisUser = \App\User::find((int) $userId);
          $thisUser->role = $role;
          $thisUser->save();
        }
      }

      \Session::flash('flash_message','User roles have been updated.');
      return redirect('/');
    }
}
