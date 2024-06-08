<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class userController extends Controller
{
    //
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits:11|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('light-menu/dashboard/analytics');
        // return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'The provided email does not exist.'])
                ->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'The provided password is incorrect.'])
                ->withInput();
        }

        $token = Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($token) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            session(['auth_token' => $token]);
        }

        $user = Auth::user();

        return redirect('light-menu/dashboard/analytics');
    }

    

}
