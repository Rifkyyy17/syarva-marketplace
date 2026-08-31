<?php

namespace App\Http\Controllers;

use App\Services\GeminiChatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    public function __construct(private readonly GeminiChatService $aiService) {}

    public function chat(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
            'history' => ['nullable', 'array', 'max:20'],
            'history.*.role' => ['required', 'string', 'in:user,assistant,model'],
            'history.*.content' => ['required', 'string', 'max:2000'],
        ]);

        $result = $this->aiService->reply(
            $validated['message'],
            $validated['history'] ?? []
        );

        return response()->json($result);
    }
}
