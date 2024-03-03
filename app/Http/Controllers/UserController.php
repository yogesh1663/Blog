<?php

namespace App\Http\Controllers;

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
        $users = User::orderByDesc('id')->where('is_admin', 0)->paginate(3);
        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:6',
            'status' => 'required'
        ]);
        $sql = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);
        if ($sql) {
            return redirect()->route('users.index')->with('success', 'User has been successfully added.');
        } else {
            return redirect()->back();
        }
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
    public function edit(User $user)
    {
        return view('Users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'status' => 'required'
        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ]);
        if ($request->password) {
            $user->update([
                'password' => $request->password,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User data successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User data successfully deleted.');
    }
}
