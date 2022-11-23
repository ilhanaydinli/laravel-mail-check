<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Illuminate\Console\Command;
use IlhanAydinli\LaravelMailCheck\Facade\MailCheck;
use IlhanAydinli\LaravelMailCheck\Commands\BaseCommand;

class SpfCheckCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-check:spf
                            {from-email? : The email that sent the mail.}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Checks whether it can send mail on behalf of the e-mail address.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = $this->emailValidation('mail-check:spf', false);

        $this->alert("Please Wait - SPF Checking");
        $checkServer = MailCheck::checkSpf($emails['fromEmail']);
        if ($checkServer['status'] == true) {
            $this->info($checkServer['msg']);
            return Command::SUCCESS;
        } elseif ($checkServer['status'] == false) {
            $this->error($checkServer['msg']);
            return Command::FAILURE;
        }
        return Command::FAILURE;
    }
}
