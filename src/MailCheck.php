<?php

namespace IlhanAydinli\LaravelMailCheck;

use Illuminate\Support\Facades\Mail;
use IlhanAydinli\LaravelMailCheck\Mail\MailCheckMail;
use Dietercoopman\Mailspfchecker\Facades\Mailspfchecker;

class MailCheck
{
    public const VIEWS = 'mail-check';

    public function send($email)
    {
        Mail::to($email)->send(new MailCheckMail());
    }

    public function checkConfig()
    {
        $errors = [];
        if (config('mail.default') == 'smtp') {
            if (empty(config('mail.mailers.smtp.host'))) {
                array_push($errors, 'Mail host not found.');
            }
            if (empty(config('mail.mailers.smtp.port'))) {
                array_push($errors, 'Mail port not found.');
            }
            if (empty(config('mail.mailers.smtp.encryption'))) {
                array_push($errors, 'Mail encryption not found.');
            }
            if (empty(config('mail.mailers.smtp.username'))) {
                array_push($errors, 'Mail username not found.');
            }
            if (empty(config('mail.mailers.smtp.password'))) {
                array_push($errors, 'Mail password not found.');
            }
        }

        if (empty(config('mail.from.address'))) {
            array_push($errors, 'Mail from address not found.');
        }
        if (empty(config('mail.from.name'))) {
            array_push($errors, 'Mail from name not found.');
        }

        return count($errors) > 0 ? $errors : false;
    }

    public function checkSpf($mail)
    {
        if (Mailspfchecker::canISendAs($mail)) {
            return [
                'status' => true,
                'msg' => "You can send an e-mail on behalf of $mail."
            ];
        } else {
            $spfMsg = Mailspfchecker::howCanISendAs($mail);
            return [
                'status' => false,
                'msg' => "You cannot send an e-mail on behalf of $mail.\n$spfMsg"
            ];
        }
    }
}
