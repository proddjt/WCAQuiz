<x-layout>
    <div class="container-fluid vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                <h1 class="text-center">Choose mode and difficulty</h1>
                <div class="row w-100">
                    <div class="col-12 d-flex justify-content-center align-items-center w-100">
                        <form action="{{route('quiz.person')}}" method="POST" class="d-flex justify-content-center align-items-center w-25 flex-column">
                            @csrf
                            <div class="mb-2 d-flex justify-content-center align-items-center w-100">
                                <div class="form-floating w-50">
                                    <select name="mode" id="mode" class="form-select">
                                        <option value="IT" selected>Italian only</option>
                                        <option value="europe">Europe</option>
                                        <option value="africa">Africa</option>
                                        <option value="asia">Asia</option>
                                        <option value="north-america">North America</option>
                                        <option value="south-america">South America</option>
                                        <option value="world">Worldwide</option>
                                    </select>
                                    <label for="mode">Mode</label>
                                </div>
                                <div class="form-floating w-50">
                                    <select name="difficulty" id="difficulty" class="form-select">
                                        <option value="ez">Easy</option>
                                        <option value="md" selected>Medium</option>
                                        <option value="hd">Hard</option>
                                    </select>
                                    <label for="difficulty">Difficulty</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success text-decoration-none w-100">Start</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>