<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $baseUrl = 'https://raw.githubusercontent.com/robiningelbrecht/wca-rest-api/master';
        $totalPages = ceil(Http::get($baseUrl . '/api/persons-page-1.json')->json()['total'] / 1000);
        $count = 1;
        while ($count <= $totalPages) {
            $page = collect(Http::get($baseUrl . '/api/persons-page-' . $count . '.json')->json())->get('items');
            foreach ($page as $person) {
                Person::create([
                    'name' => $person['name'],
                    'wca_id' => $person['id'],
                    'country' => $person['country'],
                    'numberOfCompetitions' => $person['numberOfCompetitions'],
                    'numberOfChampionships' => $person['numberOfChampionships'],
                    'rank' => $person['rank'],
                    'medals' => $person['medals'],
                    'records' => $person['records'],
                ]);
            }
            $count++;
        }
    }
}
