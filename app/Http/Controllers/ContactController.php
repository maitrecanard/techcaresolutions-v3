<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\Connexion;
use App\Mail\ForPublic;
use App\Mail\Indiscrete;
use App\Mail\NewUser;

class ContactController extends Controller
{
    public static function sendMail($data)
    {
        Mail::to(self::address())->send(new Contact($data));
    }

    public static function mailForPublic($email, $data)
    {
        Mail::to($email)->send(new ForPublic($data));
    }

    //public static function connexionMail($device, $country)
    //{   
    //    Mail::to(self::address())->send(new Connexion($device, $country));
    //}
//
    //public static function userGenerate(string $email, array $data)
    //{
    //    Mail::to($email)->send(new NewUser($data));
    //}
//
    //public static function Error($error)
    //{
    //    Mail::to(self::address())->send(new Error($error));
    //}

    private static function address()
    {
        return "mathieu.siaudeau@techcaresolutions.fr";
    }
}