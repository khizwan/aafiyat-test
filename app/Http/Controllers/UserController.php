<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
            'status_active' => 'boolean',
        ]);

        $validated['password'] = bcrypt($validated['password']); // Hash password
        User::create($validated);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function index()
    {
        $users = User::where('status_active', true)->get();
        //return view('table', compact('users'));
        return response()->json(['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
