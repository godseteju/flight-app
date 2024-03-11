<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetHtmlFilePath extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'html:file-path';

    protected $description = 'Get the absolute path to the HTML file';

    public function handle()
    {
        $htmlFilePath = public_path('roster/roster.html');

        if (!file_exists($htmlFilePath)) {
            $this->error("HTML file does not exist.");
            return;
        }

        $this->info("Absolute path to the HTML file: $htmlFilePath");
    }
}
