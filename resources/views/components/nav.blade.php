<nav class="navbar bg-primary">
  <form class="container-fluid justify-content-start">
    <a class="btn btn-success me-2" href="{{route('home')}}">Home</a>
    <button class="btn btn-secondary me-2" type="button" wire:click="revealAnswer()">Svela la risposta</button>
    <a class="btn btn-danger" href="{{route('quiz.start')}}">Nuovo quiz</a>
  </form>
</nav>