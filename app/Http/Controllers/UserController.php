<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
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
            $perPage = $request->input('per_page', 10); 
            $orderBy = $request->input('order_by', 'created_at'); 
            $orderDirection = $request->input('order_direction', 'asc'); // desc
            $usersQuery = User::query()->orderBy($orderBy, $orderDirection);
            if ($request->has('page')) {
                $page = $request->input('page');
                $offset = ($page - 1) * $perPage;
                $usersQuery->skip($offset)->take($perPage);
            }
            $users = $usersQuery->paginate($perPage);
            return response()->json([
                'status' => true,
                'data' => $users->items(),
                'total' => $users->total(),
                'per_page' => $perPage,
                'message' => 'Success'
            ], 200);
        } catch (QueryException $e) {
            Log::error('users getting error:' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'An error occurred'
            ], 500);
        }
    }
}
