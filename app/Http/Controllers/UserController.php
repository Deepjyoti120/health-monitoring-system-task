<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin/users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            'role_name' => 'user'
        ]);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }
    // FOR API
    public function getUsers(Request $request)
    {
        try {
            $validated = $request->validate([
                'per_page' => 'integer|min:1|max:100',
                'order_by' => 'string|in:id,name,email,created_at',
                'order_direction' => 'string|in:asc,desc',
                'page' => 'integer|min:1'
            ]);
            $perPage = $validated['per_page'] ?? 10;
            $orderBy = $validated['order_by'] ?? 'created_at';
            $orderDirection = $validated['order_direction'] ?? 'asc';
            $users = User::orderBy($orderBy, $orderDirection)
                ->paginate($perPage); 
            // return $users;
            return response()->json([
                'status' => true,
                'data' => $users->items(),
                'total' => $users->total(),
                'message' => 'Success'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors()
            ], 400);
        } catch (\Exception $e) {
            Log::error('users getting error:' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
