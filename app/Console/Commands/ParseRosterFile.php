<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Event;


class ParseRosterFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roster:parse {roster}';

    protected $description = 'Parse the roster file and store events in the database';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
        $file = $this->argument('roster');
    $rosterData = file_get_contents($file);
    $rows = explode("\n", $rosterData);

    foreach ($rows as $row) {
        // Parse each row and extract relevant information
        $data = $this->parseRow($row);
        dd($data);

        // Store the parsed data in the database
        if ($data !== null) {
        Event::create($data);
    } else {
        // Handle case where $data is null (optional)
        // Log error
    }
    }

    $this->info('Roster file parsed successfully.');
}

private function parseRow($row)
{
    $columns = explode("\t", $row);
    // dd($columns);
    if (count($columns) >= 8) {
    // Extract relevant information from each column
    $date = $columns[0];
    $activityType = $columns[7];
    // Extract other relevant information...

    // Return an array containing the extracted information
    return [
        'date' => $date,
        'activity_type' => $activityType,
        // Add other extracted information here...
    ];
} else {
    // Handle case where index 7 doesn't exist
    $activityType = null; // Or any default value
}
}
}
