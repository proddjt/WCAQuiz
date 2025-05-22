<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WcaApiService;
use Illuminate\Validation\Rule;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    protected $wcaApi;

    public function __construct(WcaApiService $wcaApi){
        $this->wcaApi = $wcaApi;
    }

    public function home(){
        return view ('welcome');
    }

    public function start(){
        return view ('start');
    }

    public function person(Request $request){
        $person = $this->wcaApi->getRandomPerson($request->input('mode'), $request->input('difficulty'));
        $countryList = collect(Http::get('https://raw.githubusercontent.com/robiningelbrecht/wca-rest-api/master/api/countries.json')->json())->get('items');
        return view ('new', ['person' => $person, 'countryList' => $countryList]);
    }

}
