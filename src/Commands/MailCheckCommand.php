<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Throwable;
use Illuminate\Console\Command;
use IlhanAydinli\LaravelMailCheck\Facade\MailCheck;

class MailCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Check sending email using Laravel's mail settings.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->alert("Please Wait - E-Mail Sending");
            MailCheck::sendMail();
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
