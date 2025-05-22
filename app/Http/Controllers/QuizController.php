<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WcaApiService;

class QuizController extends Controller
{
    protected $wcaApi;

    public function __construct(WcaApiService $wcaApi){
        $this->wcaApi = $wcaApi;
    }
    public function person(){
        $person = $this->wcaApi->getRandomPerson();
        return view ('welcome', compact('person'));
    }

    public function home(){
        return view ('welcome');
    }
}
