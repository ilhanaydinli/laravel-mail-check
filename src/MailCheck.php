<?php

namespace IlhanAydinli\LaravelMailCheck;

use Illuminate\Support\Facades\Mail;
use IlhanAydinli\LaravelMailCheck\Mail\MailCheckMail;

class MailCheck
{
    public const VIEWS = 'mail-check';

    public function sendMail()
    {
        Mail::to(config('mail.from.address'))->send(new MailCheckMail());
    }
}
