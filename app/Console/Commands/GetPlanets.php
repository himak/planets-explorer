<?php

namespace App\Console\Commands;

use App\Models\Planet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        // Import Planets

        // Get API urls
        $url = config('api.url');

        // Destroy existing planets
        DB::table('planets')->truncate();

        // Dubug info
        $this->info('Start import Planets to database:');
        echo('1%');

        do {
            $response = Http::get($url);

            $page = $response->json('next'); // paginate for next page
            $planets = $response->collect('results');

            // Import Planets to DB
            $planets->each(function ($planet, $key) {
                // Dubug info
                echo ".";
                Planet::query()->create($planet);
            });

                // TODO: Import residents of this planet to database
//                for ($i=0; $i < count($planet->residents); $i++) {
//                    $json = file_get_contents($url);
//                    $result = json_decode($json);
//                    $url = $result->next;
//                    print_r($planet->residents);
//                    foreach($planet->residents as $resident) {
//
//                        $json = file_get_contents($resident);
//                        $result = json_decode($json);
//
//                        // species
//                        $result->species;
//
//                        DB::table('planet_resident')->insertGetId([
//                            'planet_id' => $planetId,
//                            'resident_id' => $resident,
//                        ]);
//                        print_r($result->species);
//                    }
//                    echo '\n\n';
//                }

        } while($page);

        $this->line('100%');
        $this->info('Import Planets done.');

        // TODO: Import People


        // TODO: Import Residents of Planets

        return 0;
    }
}
