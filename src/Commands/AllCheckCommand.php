<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use IlhanAydinli\LaravelMailCheck\Commands\BaseCommand;

class AllCheckCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-check:all
                            {email? : For all mail checks.}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Do all the checks.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->emailValidation('mail-check:all');

        $this->call('mail-check:config');
        $this->newLine();
        $this->call('mail-check:spf', [
            'email' => $email
        ]);
        $this->newLine();
        $this->call('mail-check:mail', [
            'email' => $email
        ]);
    }
}
