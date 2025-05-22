<div>
    <div class="input-group">
        <input class="form-control" type="search" value="" placeholder="Your answer" wire:model.live.debounce.300ms="query">
        <button class="btn btn-outline-secondary" type="button" id="sendBtn" disabled>Search</button>
    </div>
    @if($results)
        @foreach($results as $result)
        <button class="search-select-btn" wire:click="submitAnswer('{{$result->wca_id}}')"><span class="fi fi-{{strtolower($result->country)}}"></span> {{$result->name}} ({{$result->wca_id}})</span></option>
        @endforeach
    @endif
</div>
