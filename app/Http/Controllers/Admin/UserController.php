<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|confirmed|min:6',
        'role' => 'required|in:admin,health_worker,village_official',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,health_worker,village_official',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = User::findOrFail($id);

    // Optional: prevent self-deletion or protect admin
    if (auth()->check() && auth()->user()->id == $user->id) {
        return redirect()->route('users.index')->with('error', 'You cannot delete yourself.');
    }

    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}
