<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetResidents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'explorer:residents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the list of all known residents.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Import Residents

        // Get API urls
        $url = 'https://swapi.py4e.com/api/people';

        echo "Start import Residents to database:\n";

        DB::table('residents')->truncate();

        echo "1%";

        do {
            $json = file_get_contents($url);
            $result = json_decode($json);
            $url = $result->next;

            // Import Planets to DB
            for ($i=0; $i < count($result->results); $i++) {

                // Dubug info
                echo ".";

                // resident object
                $resident = $result->results[$i];

                // name of resident
                $name = $resident->name !== 'unknown' ? $resident->name : null;

                // get name of species
                $json = file_get_contents($resident->species[0]);
                $species = json_decode($json);
                $species = $species->name !== 'unknown' ? $species->name : null;

                // Save resident with species
                DB::table('residents')->insert([
                    'name' => $name,
                    'species' => $species,
                ]);
            }

        } while($result->next);

        echo "100%\n";
        echo "Import Residents done.\n";

        return 0;
    }
}
