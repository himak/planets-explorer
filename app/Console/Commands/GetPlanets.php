<?php

namespace App\Console\Commands;

use App\Models\Planet;
use App\Models\Resident;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
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
        $this->info('Please seat and continue drinking your coffee ☕️');
        $this->info('Searching Planets for import...');

        sleep(1);
        echo('3..');

        sleep(1);
        echo('2..');

        sleep(1);
        echo('1..');

        sleep(1);
        echo('starting..');

        do {
            $response = Http::get($url);
            $planets = $response->collect('results');
            $url = $response->json('next'); // paginate for next page

            // Create Planets
            $planets->each(function ($planet, $key) {

                // Dubug info
                echo '.' . Arr::random(['🪐', '💫', '🌎', '🌖']) . '.';

                $planet['rotation_period'] =  $planet['rotation_period'] !== 'unknown' ? $planet['rotation_period'] : null;
                $planet['diameter'] =  $planet['diameter'] !== 'unknown' ? $planet['diameter'] : null;
                $planet['population'] = $planet['population'] !== 'unknown' ? $planet['population'] : null;

                $planetId = Planet::query()->create($planet);

                // Create Residents of Planets
                $residents = collect($planet['residents']);

                // Dubug info
                echo '.' . Arr::random(['🦾', '🥶', '🐫', '🦄']) . '.';

                $residents->each(function($residentUrl, $key) use ($planetId) {

                    $response = Http::get($residentUrl);

                    $resident = $response->json();

                    // If Resident have a one species, get name from API and save to the Resident
                    if (count($resident['species'])) {

                        echo (".");

                        // Get info about species
                        $species = Http::get($resident['species'][0]);

                        // Find Resident and update or create as new
                        $residentID = Resident::query()->updateOrCreate(
                            [
                                'name' =>  $resident['name'],
                                'species' => $species->json('name')
                            ],
                            [
                                'name' => $resident['name'],
                                'species' => $species->json('name')
                            ]
                        );

                        // Attach Resident to thd Planet
                        $planetId->residents()->attach($residentID);
                    };
                });
            });
        } while($url);

        $this->newLine(1);
        $this->info('Import Planets with Residents is done.');

        return 0;
    }
}
