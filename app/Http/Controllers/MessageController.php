<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $token = "v2n49drKeWNoRDN4jgqcdsR8a6bcochcmk6YphL6vLcCpRZdV1";
        $message = sprintf("-------------------------%c%s%c------------------------- ", 10, $request->input('message'), 10);

        $response = Http::post('https://app.ruangwa.id/api/send_message', [
            'token' => $token,
            'number' => $request->input('phone_number'),
            'message' => $message,
        ]);

        // Check if request was successful
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Message sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send message. Please try again.');
        }
    }
}
