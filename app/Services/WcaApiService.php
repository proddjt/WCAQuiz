<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WcaApiService
{
    protected $baseUrl = 'https://raw.githubusercontent.com/robiningelbrecht/wca-rest-api/master';
    
    public function getRandomPerson(){
        $pageNumber = ceil(Http::get($this->baseUrl . '/api/persons.json')->json()["total"] / 1000);
        $personList = Http::get($this->baseUrl . '/api/persons-page-' . rand(1, $pageNumber) . '.json')->json();
        $person = $personList["items"][rand(0, count($personList) - 1)];
        return $person;
    }
}