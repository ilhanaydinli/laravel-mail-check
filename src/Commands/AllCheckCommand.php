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
                            {from-email? : The email that sent the mail.}
                            {to-email? : The email that receives the mail.}
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
        $emails = $this->emailValidation('mail-check:all');

        $this->call('mail-check:config');
        $this->newLine();
        $this->call('mail-check:spf', [
            'from-email' => $emails['fromEmail']
        ]);
        $this->newLine();
        $this->call('mail-check:mail', [
            'from-email' => $emails['fromEmail'],
            'to-email' => $emails['toEmail']
        ]);
    }
}
