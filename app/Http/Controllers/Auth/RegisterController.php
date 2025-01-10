<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FieldOfWork;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:Male,Female'],
            'fields' => ['required', 'array', 'min:3'],
            'fields.*' => ['required','string','max:255'],
            'linkedin_username' => ['required', 'string', 'max:255'], 
            'mobile' => ['required', 'regex:/^\d+$/'],
            'profile_picture' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'linkedin_username' => $data['linkedin_username'],
            'mobile' => $data['mobile'],
            'profile_picture' => $data['profile_picture'] ?? null
        ]);

        foreach ($data['fields'] as $field) {
            FieldOfWork::create([
                'user_id' => $user->id,
                'field_name' => $field,
            ]);
        }

        return $user;
    }

    public function testCreateUser()
    {
        try {
            // Create a new user with test data
            $user = User::create([
                'name' => 'Test User',               // Provide a test name
                'email' => 'testuser@example.com',   // Provide a test email
                'password' => bcrypt('password123'), // Hash the password
                'gender' => 'male',                  // Provide gender
                'linkedin_username' => 'test-linkedin', // Provide linkedin username
                'mobile' => '+62123456789',          // Provide mobile number
                'profile_picture' => null            // Assuming no profile picture for testing
            ]);

            // Return a response to confirm the user was created
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the creation
            return response()->json([
                'error' => 'Error creating user: ' . $e->getMessage()
            ], 500);
        }
    }
}
