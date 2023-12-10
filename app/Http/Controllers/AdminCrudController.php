<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminCrudController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $filename = null;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'userName' => 'required|string|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'type' => 'required|integer|in:1,2',
            'status' => 'required|boolean',
            'faceBook' => 'nullable|active_url',
            'instagram' => 'nullable|active_url',
            'telegram' => 'nullable|active_url',
            'youTube' => 'nullable|active_url',
        ]);

        // Handle image upload
        if ($request->file('imageUrl')) {
            $file = $request->file('imageUrl');
            @unlink(public_path('upload/admin_images'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
        }

        // Create user data
        $data = $request->only([
            'name', 'userName', 'password', 'type', 'status',
            'faceBook', 'instagram', 'telegram', 'youTube',
        ]);
        $data['password'] = Hash::make($data['password']);
        if ($filename) {
            $data['imageUrl'] = $filename;
        }

        User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'userName', 'status']);

        if (Auth::user()->type == 'Admin') {
            // Admin can update password and image
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'userName' => 'nullable|string|unique:users,userName,' . $user->id,
                'password' => 'nullable|string|confirmed|min:8',
                'status' => 'nullable|boolean',
                'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->file('imageUrl')) {
                $file = $request->file('imageUrl');
                @unlink(public_path('upload/admin_images'));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $data['imageUrl'] = $filename;
            }
        } else {
            // Agent can only update social media links
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'faceBook' => 'nullable|active_url',
                'instagram' => 'nullable|active_url',
                'telegram' => 'nullable|active_url',
                'youTube' => 'nullable|active_url',
            ]);

            $data = $request->only(['name', 'faceBook', 'instagram', 'telegram', 'youTube']);
        }

        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
