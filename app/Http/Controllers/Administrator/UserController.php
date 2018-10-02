<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Redirect;
use App\Http\Requests\StoreClientRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('administrator.user.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        // get only selected parameters from $request
        $requests = $request->only('name', 'password', 'email');

        try {
            // create new user
            $user = User::create($requests);

            // attache client role to new registered user
            $user->attachRole('client');

            // redirect with create flash message and set to session.
            Session::flash('message', 'Client created Successfully!');
            return Redirect::to('admin/users');

        } catch (\Exception $e) {

            // redirect with create flash message and set to session.
            Session::flash('error', 'Something went wrong!');
            return Redirect::to('admin/users');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return user with their role
        $user = User::with(['roles'])->find($id);
        // show the view and pass the user to it
        return view('administrator.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get user
        $user = User::find($id);

        // show the edit form and pass the user
        return view('administrator.user.edit')->with('user', $user);
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
        $requests = $request->only('name', 'email');
        try {
            // find user with given id
            $user = User::find($id);

            // save  into database
            $user->name       = $requests['name'];
            $user->email      = $requests['email'];
            $user->save();

            // redirect with create flash message and set to session.
            Session::flash('message', 'Client updated Successfully!');
            return Redirect::to('admin/users');

        } catch (\Exception $e) {

            // redirect with create flash message and set to session.
            Session::flash('error', 'Something went wrong!');
            return Redirect::to('admin/users');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // delete
            $user = User::find($id);
            $user->delete();

            // redirect with create flash message and set to session.
            Session::flash('message', 'Client updated Successfully!');
            return Redirect::to('admin/users');

        } catch (\Exception $e) {
            // redirect with create flash message and set to session.
            Session::flash('error', 'Something went wrong!');
            return Redirect::to('admin/users');
        }
    }
}
