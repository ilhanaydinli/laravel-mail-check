<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class BaseCommand extends Command
{
    public function emailValidation($retryCommand)
    {
        $email = $this->argument('email');
        if (!$email) {
            $email = $this->ask(
                'What is the e-mail address you want to send test mail to?'
            );
        }
        $validator = Validator::make([
            'email' => $email,
        ], [
            'email' => ['required', 'email'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return $this->call($retryCommand);
        }

        return $email;
    }
}
