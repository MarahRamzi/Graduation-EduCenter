<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users'] = User::orderByDesc('id')->paginate(5);
        $data['roles'] = Role::all();
        
        return view('admin.users.index',$data);
    }
    public function create()
{
    $roles = Role::all();
    return view('admin.users.create', compact('roles'));
}

public function store(Request $request)
{
   $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
    ]);

    // Create the new user
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
    ]);

    return redirect()->route('admin.users.index')->with('msg', 'User created successfully!')->with('type', 'success');
}

    public function update(Request $request, $id)
    {
       
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role_id'));
        return back()->with('msg', 'User updated successfully')->with('type', 'success');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users.index')->with('msg', 'User deleted successfully')->with('type', 'danger');
    }
}
