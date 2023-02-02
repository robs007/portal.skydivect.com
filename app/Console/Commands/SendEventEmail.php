<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEventEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendEventEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email for upcoming events in the next month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::to(['rszabo@crowleyauto.net'])->send(new \App\Mail\SendEvents());

        return Command::SUCCESS;
    }
}
