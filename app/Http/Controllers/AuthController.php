<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function login(Request $request) {
        $validator = Validate(
            $request->all(),
            [
                'email' => ['required', 'string', 'exists:App\Models\User,email'],
                'password' => ['required', 'string']
            ]
        );

        if ($validator->failed()) {
            Log::error('Login validation failed');
            return $this->jsonResponse(false, ['message' => 'Validation failed'], 400);
        }

        if (!$user = Auth::attempt(
            [
                'email' => $request->validated['email'],
                'password' => $request->validated['password']
            ]
        )) {
            Log::error('Combination username and password not found');
            return $this->jsonResponse(false, ['message' => 'Combination username and password not found'], 403);
        }



        // Create token and return it...
    }
}
