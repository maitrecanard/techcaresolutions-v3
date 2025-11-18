<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

class ContactApiController extends Controller
{
    public function sendMessage(Request $request)
    {
       $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|string",
            "entreprise" => "nullable|string"
       ]);

       ContactController::sendMail($data);
       ContactController::mailForPublic($data['email'], $data);
    }
}