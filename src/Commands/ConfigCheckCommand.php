<?php

namespace IlhanAydinli\LaravelMailCheck\Commands;

use Illuminate\Console\Command;
use IlhanAydinli\LaravelMailCheck\Facade\MailCheck;

class ConfigCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-check:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Checks Laravel mail settings.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->alert("Please Wait - Mail Config Checking");
        $checkMessages = MailCheck::checkConfig();
        if ($checkMessages) {
            foreach ($checkMessages as $checkMessage) {
                $this->error($checkMessage);
            }
            return Command::FAILURE;
        }

        $this->info("Mail settings are successful.");
        return Command::SUCCESS;
    }
}
