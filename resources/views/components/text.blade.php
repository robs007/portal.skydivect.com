@props([
    'error' => false,
    'icon' => false,
    'reservestatus' => false,
    'help' => ''
])


<div class="mt-1 relative rounded-md shadow-sm">
    @if($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/mail -->
            {{$icon}}
        </div>

    @endif

    <input {{$attributes->merge()}}  type="text"
    @if($error)
               class="block w-full rounded-md border-red-300 pr-10 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm @if($icon) pl-10 @endif ">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <svg class="h-5 w-5 text-red-500"
             x-description="Heroicon name: solid/exclamation-circle"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
             fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd"></path>
        </svg>
        </div>
    @else
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
            @if($reservestatus)
                @switch($reservestatus)
                    @case('green')
                        bg-green-400 text-green-800
                        @break
                    @case('yellow')
                        bg-yellow-400 text-black-800
                        @break
                    @default
                        bg-red-600 text-white
                @endswitch
            @endif
         @if($icon) pl-10 @endif"/>
    @endif
        <p class="mt-2 text-sm text-gray-500" id="email-description">{{$help}}</p>
</div>

