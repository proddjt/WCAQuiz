<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;

class QuizPage extends Component
{
    public $person;
    public $count;

    public function render()
    {
        return view('livewire.quiz-page');
    }

    public function mount($person){
        $this->person = $person;
        $this->count = 1;
    }

    #[On('submitAnswer')]
    public function submitAnswer($answer){
        if ($this->count < 9) {
            if($answer != $this->person['id'] ){
                $this->dispatch('wrongAnswer', count: $this->count);
                $this->count++;
            }else{
                $this->dispatch('correctAnswer');
            }
        }else{
            $this->dispatch('gameOver');
        }
    }
}
