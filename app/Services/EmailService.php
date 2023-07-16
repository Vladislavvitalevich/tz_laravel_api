<?php

namespace App\Services;
namespace App\Mail\SubscribeMail;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function send($to, $subject, $view, $data = [])
    {
        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)
                    ->subject($subject);
        });
    }
}