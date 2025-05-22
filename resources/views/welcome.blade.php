<x-layout>
    <h1 class="display-1 text-danger">Ciaoo</h1>
    <a href="{{ route('quiz.person') }}" class="text-white text-decoration-none"><button class="btn btn-primary">Lista persone</button></a>
    <p>ID: {{ $person['id'] }}</p>
    <p>Nome: {{ $person['name'] }}</p>
    <p>Numero di competizioni: {{ $person['numberOfCompetitions'] }}</p>
    <p>Elenco delle competizioni: @foreach ($person['competitionIds'] as $competition) {{$competition}}, @endforeach</p>
</x-layout>