<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    /**
     * Get the latest chat messages
     */
    public function index(): JsonResponse
    {
        // Get the latest 50 chats (matching your Livewire component logic)
        $chats = Chat::latest()->take(50)->get();

        return response()->json([
            'success' => true,
            'data' => $chats
        ]);
    }

    /**
     * Create a new chat message
     */
    public function store(Request $request): JsonResponse
    {
        // 1. Validate the incoming API request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'session_id' => 'nullable|string|max:255', // Mobile apps can pass a device ID here
        ]);

        // 2. Generate a session ID if the API client didn't provide one
        // (This helps group messages from the same user on the frontend)
        if (empty($validated['session_id'])) {
            $validated['session_id'] = $request->ip(); // Fallback to IP address for API calls
        }

        // 3. Save to the database
        $chat = Chat::create($validated);

        // 4. Return a success response with a 201 (Created) HTTP status code
        return response()->json([
            'success' => true,
            'message' => 'Message sent to the studio successfully.',
            'data' => $chat
        ], 201);
    }
}
