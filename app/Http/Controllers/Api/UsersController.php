<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of users.
     * GET /api/users
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    /**
     * Store a newly created user.
     * POST /api/users
     */
    public function store(Request $request)
    {
        // Basic validation. Adjust rules as needed.
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Create user and hash the password
        $user = User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'User created successfully!',
            'data'    => $user,
        ], 201);
    }

    /**
     * Display the specified user.
     * GET /api/users/{user}
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data' => $user], 200);
    }

    /**
     * Update the specified user.
     * PUT /api/users/{user}
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input. If updating the username or email, make sure they're unique.
        $validated = $request->validate([
            'username' => [
                'sometimes',
                'required',
                'string',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'sometimes|required|string|min:6',
        ]);

        // Update fields if provided
        if (isset($validated['username'])) {
            $user->username = $validated['username'];
        }
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }
        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully!',
            'data'    => $user,
        ], 200);
    }

    /**
     * Remove the specified user.
     * DELETE /api/users/{user}
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!'
        ], 200);
    }
}
