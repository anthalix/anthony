<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class VerifyFrontUserMail extends Mailable
{
    public $frontUser;
    public $verificationUrl;

    public function __construct($frontUser)
    {
        $this->frontUser = $frontUser;

        // Ici on garde le backend, car c’est Laravel qui fait la vérification
        $backendPort = request()->getPort() ?? 8000;

        $token = sha1($frontUser->email);

        // 👇 Important : lien vers le BACKEND
        $this->verificationUrl = "http://localhost:{$backendPort}/verify?user_id={$frontUser->id}&token={$token}";
    }

    public function build()
    {
        return $this->subject("Vérifiez votre compte O'refuge")
            ->view('emails.verify-frontuser');
    }
}
