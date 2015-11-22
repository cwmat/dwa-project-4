<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
      // Reroute to login page or user control panel as "/user/" shouldn't actually have any content
      // Add logic to check if a user is logged in
      // For now just link to users.login
        return view('user.login');
    }



























    /**
     * Take the user to the login screen.  Should check if the user is already logged in then should be prompted to either logout or go to control panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
      // Add logic to check if a user is logged in
        return view('user.login');
    }

    /**
     * Input login information.  Should check if the user is already logged in then should be prompted to either logout or go to control panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin()
    {
      // Add logic to check if a user is logged in
        return view('user.login');
    }

    /**
     * Register a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
      // Add logic to check if a user is logged in
        return view('user.register');
    }

    /**
     * Register a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister()
    {
      // Add logic to check if a user is logged in
        return view('user.register');
    }

    // Route for {user_id}

































































    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
