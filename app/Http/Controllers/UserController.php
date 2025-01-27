<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
            DB::beginTransaction();
            $validated = $request->validate([
                'per_page' => 'integer|min:1|max:100',
                'order_by' => 'string|in:id,name,email,created_at',
                'order_direction' => 'string|in:asc,desc',
                'page' => 'integer|min:1',
            ]);
            $perPage = $validated['per_page'] ?? 10;
            $orderBy = $validated['order_by'] ?? 'created_at';
            $orderDirection = $validated['order_direction'] ?? 'asc';
            $users = User::orderBy($orderBy, $orderDirection)->paginate($perPage);
            // return $users;
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => $users->items(),
                'total' => $users->total(),
                'message' => 'Success'
            ], 200);
            // DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->errors()
            ], 400);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('users getting error:' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(compact('user'));
    }
    public function logins(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);
        $credentials = $request->only('email', 'password');
        Log::info('Attempting login with credentials: ', $credentials);
        if ($token = auth('api')->attempt($credentials)) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function dashboard()
    {
        $numbers = range(1, 48);
        return view('dashboard', ['numbers' => $numbers,'total' => 44]);
    }
}
