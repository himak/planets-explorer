<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetPlanets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'explorer:planets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the list of all known planets and their residents.';

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
        // Get API urls
        $url = 'https://swapi.py4e.com/api/planets';

        echo "Start import Planets to database:\n";

        DB::table('planets')->truncate();

        echo "1%";

        do {
            $json = file_get_contents($url);
            $result = json_decode($json);
            $url = $result->next;

            // Import Planets to DB
            for ($i=0; $i < count($result->results); $i++) {

                // Dubug info
                echo ".";

                $planet = $result->results[$i];

                $planetId = DB::table('planets')->insertGetId([
                    'name' => $planet->name,
                    'rotation_period' => $planet->rotation_period,
                    'diameter' => $planet->diameter,
                    'gravity' => $planet->gravity,
                ]);

                // TODO: Import residents of this planet to database
            }

        } while($result->next);

        echo "100%\n";
        echo "Import Planets done.\n";

        return 0;
    }
}
