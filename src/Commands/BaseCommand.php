<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class BaseCommand extends Command
{
    public function emailValidation($retryCommand, $includeTo = true)
    {
        $fromEmail = $this->argument('from-email');

        if (!$fromEmail) {
            $fromEmail = $this->ask(
                'From which email address do you want to send mail?',
                config('mail.from.address')
            );
        }

        $toEmailRequired = 'nullable';
        $toEmail = null;
        if ($includeTo == true) {
            $toEmail = $this->argument('to-email');
            if (!$toEmail) {
                $toEmail = $this->ask(
                    'To which email address do you want to send mail?'
                );
            }
            $toEmailRequired = 'required';
        }

        $validator = Validator::make([
            'fromEmail' => $fromEmail,
            'toEmail' => $toEmail,
        ], [
            'fromEmail' => ['required', 'email'],
            'toEmail' => [$toEmailRequired, 'email'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return $this->call($retryCommand);
        }

        return compact('fromEmail', 'toEmail');
    }
}
