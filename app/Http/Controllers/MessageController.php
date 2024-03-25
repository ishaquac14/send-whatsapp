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
        $nama_pengirim = $request->input('name');
        $isi = $request->input('message');
        $nomor = $request->input('phone_number');

        $message = sprintf("----------SEND MESSAGE----------\n%s\n-----------------------------------\nFrom : %s", $isi, $nama_pengirim);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token=' . $token . '&number=' . $nomor . '&message=' . $message,
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Check if request was successful
        if ($response) {
            return redirect()->back()->with('success', 'Message sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send message. Please try again.');
        }
    }
}
