<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController
{
   public function index()
   {
    $user = User::all();
    return view ('users.index')->with('users' ,$user);
   }
   public function create()
   {
       return view('users.create');
   }
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:staff,doctor'
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
        ]);

       return view ('users.index')->with('success', 'User created successfully!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit')->with('users' ,$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:staff,doctor',
            'password' => 'nullable|min:6',
        ]);

        //$user->update($request->all());
        $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->role = $request->input('role');
       
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

       return view ('users.index')->with('success', 'User updated successfully!');
    }
}
