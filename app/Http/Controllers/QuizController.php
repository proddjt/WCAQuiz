<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WcaApiService;
use Illuminate\Validation\Rule;
use App\Http\Requests\QuizRequest;

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
        dd($person);
        return redirect()->route('quiz.start')->with('person', $person);
    }

}
