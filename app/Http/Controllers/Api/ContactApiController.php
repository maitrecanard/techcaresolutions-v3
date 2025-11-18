<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Services\DiscordService;

class ContactApiController extends Controller
{
    public function sendMessage(Request $request)
    {
       $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|string",
            "entreprise" => "nullable|string",
       ]);

       ContactController::sendMail($data);
       ContactController::mailForPublic($data['email'], $data);

         DiscordService::sendToChannel(
              'Contact',
              'contact',
              "Nouveau message de : " . $data['name'] .  " (" . $data['email'] . ")" . "\n\n" . $data['message']
         );
    }
}