<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cities {uf}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities from IBGE API';

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
        try {
            $uf = $this->argument('uf');
            $response = Http::get(env('URLBASE_API_IBGE') . "api/v1/localidades/estados/$uf/municipios");
            $cities = $response->json();

            foreach ($cities as $city) {
                City::create([
                    'name' => $city['nome'],
                ]);
            }

            $this->info("Cities imported successfully");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
