<?php
namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Ensure Auth is imported
use Illuminate\Support\Facades\Storage; // Add this for file storage
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{

public function getUser(Request $request)
{
    // Log the authenticated user
    Log::info('Authenticated User:', ['user' => Auth::user()]);

    return response()->json([
        'user' => Auth::user(), // Return the authenticated user
    ]);
}


    public function register(Request $request)
    {
        // Log the incoming request data
        Log::info('Registration attempt', ['request' => $request->all()]);

        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // Remove the role from the validation rules
            // 'role' => 'required|string|in:admin,customer', // Commented out or removed
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create user
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // Set default role to 'customer' if not specified
                'role' => 'customer', // Default role
            ]);

            Log::info('User created successfully', ['user_id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('User creation failed', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'User registration failed'], 500);
        }

        // Do not generate token here, instead, return user details
        return response()->json(['user' => $user], 201);
    }


public function login(Request $request)
{
    // Log the incoming request for debugging
    Log::info('Login attempt received', ['email' => $request->email]);

    // Validate user input
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Log the validation errors (if any)
    if ($validator->fails()) {
        Log::warning('Validation failed', ['errors' => $validator->errors()]);
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Check credentials in the database
    $user = User::where('email', $request->email)->first();
    Log::info('Checking user credentials', ['email' => $request->email, 'user_found' => $user !== null]);

    if (!$user || !Hash::check($request->password, $user->password)) {
        Log::warning('Invalid credentials', ['email' => $request->email]);
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Automatically login the user using Laravel Auth
    Auth::login($user);


    // Log the successful login
    Log::info('Login successful', ['user_id' => $user->id, 'email' => $user->email]);

    // Set the HttpOnly cookie for the token
    return response()->json([
        'user' => [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
        ]
    ]);
}


public function logout(Request $request)
{
    $user = $request->user();

    if ($user) {
          Auth::logout($user);

    } else {
        Log::warning('Logout attempted without authenticated user');
    }

    // Clear the token cookie
    return response()->json(['message' => 'Logged out successfully']);
}








}