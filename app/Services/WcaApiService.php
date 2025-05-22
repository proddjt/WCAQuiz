<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WcaApiService
{
    protected $baseUrl = 'https://raw.githubusercontent.com/robiningelbrecht/wca-rest-api/master';
    protected $check = false;
    protected $eventArray = ["222", "333", "333fm", "333oh", "444", "555", "666", "777", "clock", "minx", "pyram", "skewb", "sq1", "333bf"];
    protected $typeArray = ['single', 'average'];
    
    public function getRandomPerson($mode, $difficulty) {
        $this->check = false;
        while (!$this->check) {
            if($difficulty == 'ez') {
                $person = array_slice(collect(Http::get($this->baseUrl . '/api/rank/' . $mode . '/'. $this->typeArray[array_rand($this->typeArray)] .'/'. $this->eventArray[array_rand($this->eventArray)] . '.json')->json())->get('items'), 0, 10);
            }else if ($difficulty == 'md') {
                $person = array_slice(collect(Http::get($this->baseUrl . '/api/rank/' . $mode . '/'. $this->typeArray[array_rand($this->typeArray)] .'/'. $this->eventArray[array_rand($this->eventArray)] . '.json')->json())->get('items'), 10, 40);
            }else{
                $person = array_slice(collect(Http::get($this->baseUrl . '/api/rank/' . $mode . '/'. $this->typeArray[array_rand($this->typeArray)] .'/'. $this->eventArray[array_rand($this->eventArray)] . '.json')->json())->get('items'), 50, 50);
            }
            if ($person){
                $this->check = true;
            }
        }
        $id = $person[array_rand($person)]['personId'];
        return Http::get($this->baseUrl . '/api/persons/' . $id . '.json')->json();
    }
}