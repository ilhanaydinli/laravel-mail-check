<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Throwable;
use Illuminate\Console\Command;
use IlhanAydinli\LaravelMailCheck\Facade\MailCheck;
use IlhanAydinli\LaravelMailCheck\Commands\BaseCommand;

class MailCheckCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-check:mail
                            {from-email? : The email that sent the mail.}
                            {to-email? : The email that receives the mail.}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Check sending email using Laravel mail settings.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = $this->emailValidation('mail-check:mail');

        try {
            $this->alert("Please Wait - E-Mail Sending");
            MailCheck::send($emails);
            $this->info("E-mail sending was successful.");

            return Command::SUCCESS;
        } catch (Throwable $e) {
            $this->error('E-mail sending was unsuccessful.');
            $this->newLine();
            $this->error($e->getMessage());

            return Command::FAILURE;
        }
    }
}
