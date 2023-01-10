@props([
	'error' => false,
	'field'=> ''
])
<div
    x-data="{value: @entangle($field)}"
    x-init="new Pikaday({ field: $refs.input, format: 'MM/DD/YYYY',defaultDate:'1/1/1963'  ,onOpen() { this.setDate(moment($refs.input.value,'MM/DD/YYYY').toDate() ) } })"
    x-on:change="value = $event.target.value"
    class="relative rounded-md shadow-sm mt-1"
>
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <!-- Heroicon name: solid/mail -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
             fill="currentColor">
            <path fill-rule="evenodd"
                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                  clip-rule="evenodd"/>
        </svg>
    </div>

    <input
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="input"
        x-bind:value="value"

            @if($error)
                class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
            @else
                class="rounded-md flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300"
            @endif
    />
</div>


@once
    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush

    @push('scripts')
        <script src = "https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    @endpush
@endonce
