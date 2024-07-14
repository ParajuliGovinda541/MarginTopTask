<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'online_status' => 'required',
            'is_admin' => 'required',
        ]);

        // Hash the password before saving
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        // Redirect to the admin index page after successful creation
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.viewuser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'online_status' => 'required|in:0,1',
            'is_admin' => 'required|in:0,1',
        ]);
        $data['password'] = bcrypt($data['password']);
// dd($data);
        $users->update($data);
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }
}
