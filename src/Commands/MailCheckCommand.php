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
                            {email? : The e-mail address to which the test mail will be sent.}
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
        $email = $this->emailValidation('mail-check:mail');

        try {
            $this->alert("Please Wait - E-Mail Sending");
            MailCheck::send($email);
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
