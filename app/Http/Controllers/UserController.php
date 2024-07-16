<?php

namespace App\Http\Controllers;

use App\Models\Clocked;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->route('admin.index')->with('success','Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.myprofile', compact('user'));
    }

    public function updateAdmin(Request $request, $id)
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
        return redirect()->route('admin.index')->with('success','Updated Successfully');
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'online_status' => 'required|in:0,1',
            'is_admin' => 'required|in:0,1',
        ]);
        // $data['password'] = bcrypt($data['password']);
// dd($data);
        $users->update($data);
        return redirect()->route('admin.index')->with('success','Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index')->with('success','Deleted Successfully');
    }

        public function viewprofile($id)


        {
            $user = User::findOrFail($id);
            $userclock= Clocked::all();

            return view('admin.viewprofile', ['user' => $user]);

        }
}
