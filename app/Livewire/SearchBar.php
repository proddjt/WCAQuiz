<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;

class SearchBar extends Component
{
    public $query;
    public $results = [];
    public function render()
    {
        return view('livewire.search-bar');
    }

    public function updatedQuery(){
        if ($this->query == '') {
            $this->results = [];
            return;
        }
        $this->results = Person::where('name', 'like', '%' . $this->query . '%')->orWhere('wca_id', 'like', '%' . $this->query . '%')->limit(5)->get();
    }

    public function submitAnswer($answer){
        $this->dispatch('submitAnswer', answer: $answer);
    }

    #[On('wrongAnswer')]
    public function wrongAnswer($count){
        $this->query = '';
        $this->results = [];
    }

    #[On('correctAnswer')]
    public function correctAnswer(){
        $this->query = '';
        $this->results = [];
    }

    #[On('gameOver')]
    public function gameOver(){
        $this->query = '';
        $this->results = [];
    }
}
