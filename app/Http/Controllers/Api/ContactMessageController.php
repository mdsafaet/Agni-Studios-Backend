<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactMessageController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->merge([
            'name' => trim(
                (string) $request->input('name')
            ),

            'email' => Str::lower(
                trim((string) $request->input('email'))
            ),

            'message' => trim(
                (string) $request->input('message')
            ),
        ]);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/',
                'max:255',
            ],
            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ], [
            'name.required' =>
                'Please enter your name.',

            'email.required' =>
                'Please enter your email address.',

            'email.email' =>
                'Please enter an email address with a valid domain.',

            'email.regex' =>
                'Please enter a valid email, such as name@example.com.',

            'message.required' =>
                'Please enter your message.',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'message' => $validated['message'],

            'ip_address' => $request->ip(),

            'user_agent' => Str::limit(
                (string) $request->userAgent(),
                1000
            ),
        ]);

        return response()->json([
            'success' => true,
            'message' =>
                'Your message has been sent successfully.',
            'data' => [
                'id' => $contactMessage->id,
            ],
        ], 201);
    }
}