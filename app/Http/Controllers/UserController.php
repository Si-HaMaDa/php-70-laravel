<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
            'role' => 'required|in:admin,user',
            'gender' => 'required|in:m,f',
            'age' => 'required|integer',
            'bio' => 'required|regex:/^[a-zA-Z\s]*$/',
            'image' => 'nullable|file|image|between:1,6000'
        ]);

        /* $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->role = $validated['role'];
        $user->gender = $validated['gender'];
        $user->age = $validated['age'];
        $user->bio = $validated['bio'];
        $user->save(); */

        $validated['password'] = \Hash::make($validated['password']);

        if (!empty($validated['image']))
            $validated['image'] = $request->file('image')->store('users/images');

        User::create($validated);

        return redirect(route('admin.users.index'))->with('success', __('users.created'));
    }

    /**
     *__() the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        // $user = User::find($id);
        $user = User::find($id);

        if (!$user)
            return redirect(route('admin.users.index'))->with('error', 'No Profile Found!');


        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user)
            return redirect(route('admin.users.index'))->with('error', 'No Profile Found!');

        return view('admin.users.edit', compact('user'));
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
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $id,
            'password' => 'nullable|min:6|max:20|confirmed',
            'role' => 'required|in:admin,user',
            'gender' => 'required|in:m,f',
            'age' => 'required|integer',
            'bio' => 'required|regex:/^[a-zA-Z\s]*$/',
        ]);

        /* $user = User::find($id);
        $user->name = $validated['name'];
        ...
        $user->save(); */

        $validated['password'] = \Hash::make($validated['password']);

        // If any value is null remove it
        $validated = array_filter($validated);

        User::find($id)->update($validated);

        return redirect(route('admin.users.index'))->with('success', __('users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::find($id)->delete();
        User::destroy($id);
        return redirect(route('admin.users.index'))->with('success', __('users.deleted'));
    }
}
