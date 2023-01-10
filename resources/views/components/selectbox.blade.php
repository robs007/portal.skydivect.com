@props([
    'error' => false,
])

<div>
    <select {{$attributes}}
            @if($error)
                class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm bg-white  border border-red-300 pr-10 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm">
        @else
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

        @endif

        {{$slot}}
    </select>
</div>
