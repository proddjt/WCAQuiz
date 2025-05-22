<x-layout>
    <livewire:quiz-page :person="$person"/>

    <script>
        let person = @json($person);
        let countryList = @json($countryList);
    </script>
</x-layout>