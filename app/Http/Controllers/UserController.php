<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $apiUser = $request['user'];
        $meta = $request['meta'];
        $user = User::firstOrCreate(
            [
                'dantech_email' => $apiUser['email'],
            ],
            [
                'dantech_id' => $apiUser['id'],
                'dantech_name' => $apiUser['name'],
                'dantech_email' => $apiUser['email'],
                'token' => $meta['token'],
                'dantech_address' => $apiUser['address'],
            ]
        );

        if ($user) {
            return response()->json([
                'error' => false,
                'message' => 'User created successful or user found!',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Login Fail'
            ], 400);
        }
    }
}
