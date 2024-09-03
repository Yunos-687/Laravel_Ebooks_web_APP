<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function createToken(Request $request)
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Validate the incoming request
        $validated = $request->validate([
            'token_name' => 'required|string|max:255',
        ]);

        $tokenName = $validated['token_name'];

        // Check if the user already has a token with the given name
        $existingToken = $user->tokens()->where('name', $tokenName)->first();

        if ($existingToken) {
            $existingToken->delete();

            // Create a new token with the same name
            $newToken = $user->createToken($tokenName)->plainTextToken;

            return response()->json([
                'message' => 'A token with this name already existed and has been replaced with a new token.',
                'token' => $newToken,
            ], 200);
        }

        // Create a new token with the provided token name
        $token = $user->createToken($tokenName);

        // Return the new token's plain text
        return response()->json(['token' => $token->plainTextToken]);
    }
}
