<div>
    <x-nav/>
    <div class="container pb-5">
        <div class="row pt-5">
            <div class="col-12">
                <livewire:searchBar/>
            </div>
            <div class="col-12 d-flex align-items-center flex-column">
                <h4 class="text-danger fw-bold text-uppercase pb-3" id="error"></h4>
                <h4 class="text-success fw-bold text-uppercase pb-3" id="success"></h4>
                <h5 class="fw-bold text-uppercase">Remaining attempts: {{(9-$count)}}</h5>
            </div>

            {{-- NAME --}}
            <div class="col-12 pt-5 mt-5">
                <h3 class="text-center fw-bold" id="person_name">?????????</h3>
            </div>

            {{-- INFO --}}
            <div class="col-12">
                <table class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nationality</th>
                            <th scope="col">WCA ID</th>
                            <th scope="col">Competitions number</th>
                            <th scope="col">Championships number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-secondary">
                            <td id="nationality">???</td>
                            <td id="wca_id">???</td>
                            <td id="competitions_number">???</td>
                            <td id="championships_number">???</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- RESULTS --}}
            <div class="col-12">
                <h4 class="text-center fw-bold" id="best_results">Best results</h4>
            </div>
            <div class="col-6">
                <table class="table text-center table-hover table-striped result-table">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">NR</th>
                            <th scope="col">CR</th>
                            <th scope="col">WR</th>
                            <th scope="col">Single</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($person["rank"]["singles"] as $single)
                        <tr class="table-secondary">
                            <td id="event"><span class="cubing-icon fs-5 event-{{$single["eventId"]}}"></span></td>
                            <td id="div_{{$single["eventId"]}}_nr_rank_single">???</td>
                            <td id="div_{{$single["eventId"]}}_cr_rank_single">???</td>
                            <td id="div_{{$single["eventId"]}}_wr_rank_single">???</td>
                            <td id="div_{{$single["eventId"]}}_single">???</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="col-6">
                <table class="table text-center table-hover table-striped result-table">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">NR</th>
                            <th scope="col">CR</th>
                            <th scope="col">WR</th>
                            <th scope="col">Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($person["rank"]["averages"] as $average)
                        <tr class="table-secondary">
                            <td id="event"><span class="cubing-icon fs-5 event-{{$average["eventId"]}}"></span></td>
                            <td id="div_{{$average["eventId"]}}_nr_rank_average">???</td>
                            <td id="div_{{$average["eventId"]}}_cr_rank_average">???</td>
                            <td id="div_{{$average["eventId"]}}_wr_rank_average">???</td>
                            <td id="div_{{$average["eventId"]}}_average">???</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- MEDALS --}}
            <div class="col-6">
                <h4 class="text-center fw-bold">Medals</h4>
                <table class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Gold</th>
                            <th scope="col">Silver</th>
                            <th scope="col">Bronze</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-secondary">
                            <td id="golds">???</td>
                            <td id="silvers">???</td>
                            <td id="bronzes">???</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- RECORDS --}}
            <div class="col-6">
                <h4 class="text-center fw-bold">Records</h4>
                <table class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">WR</th>
                            <th scope="col">CR</th>
                            <th scope="col">NR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-secondary">
                            <td id="wr">???</td>
                            <td id="cr">???</td>
                            <td id="nr">???</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
