<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse cities';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.hh.ru/areas');
        $cities = collect($response->json())->firstWhere('name', 'Россия')['areas'];

        foreach ($cities as $region) {
            foreach ($region['areas'] as $city) {
                \App\Models\City::updateOrCreate(
                    ['slug' => Str::slug($city['name'])],
                    ['name' => $city['name']]
                );
            }
        }

        $this->info('Cities have been parsed and stored successfully!');
    }

}
