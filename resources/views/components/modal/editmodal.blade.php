@props(['id', 'maxWidth','title'=>'','content'=>'','buttontype'=>'submit','buttontext'=>'Update','formstart'=>''])

@php
    $id = $id ?? md5($attributes->wire('model'));

    switch ($maxWidth ?? '2xl') {
        case 'sm':
            $maxWidth = 'sm:max-w-sm';
            break;
        case 'md':
            $maxWidth = 'sm:max-w-md';
            break;
        case 'lg':
            $maxWidth = 'sm:max-w-lg';
            break;
        case 'xl':
            $maxWidth = 'sm:max-w-xl';
            break;
        case '2xl':
        default:
            $maxWidth = 'sm:max-w-2xl';
            break;
    }
@endphp

<div x-data="{ open: @entangle($attributes->wire('model')) }" class="flex justify-center">
        <!-- Trigger -->
    <!-- Modal -->
    <div
        x-dialog
        x-model="open"
        style="display: none"
        class="fixed inset-0 overflow-y-auto z-10"
    >
        <!-- Overlay -->
        <div x-dialog:overlay x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

        <!-- Panel -->
        <form {{$attributes->get('form-method')}}  class="relative min-h-screen flex items-center justify-center p-4">

            <div
                x-dialog:panel
                x-transition
                class="relative max-w-xl w-full bg-white rounded-xl shadow-lg overflow-y-auto"
            >
                <!-- Close Button -->
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" @click="$dialog.close()" class="bg-gray-50 rounded-lg p-2 text-gray-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2">
                        <span class="sr-only">Close modal</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-8">
                    <!-- Title -->
                    <h2 x-dialog:title class="text-2xl font-bold">{{$title}}</h2>

                    <!-- Content -->
                    {{$content}}
                </div>

                <!-- Footer -->
                <div class="p-4 flex justify-end space-x-2 bg-gray-50">
                    <button type="button" x-on:click="$dialog.close()" class="text-gray-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded-lg px-5 py-2.5">
                        Cancel
                    </button>

                    <button type="{{$buttontype}}" x-on:click="$dialog.close()" class="bg-slate-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 px-5 py-2.5 rounded-lg text-white">
                        {{$buttontext}}
                    </button>
                </div>
            </div>
            @if(!$formstart === '')
            </form>
            @endif

        </div>
    </div>
</div>

@once
    @push('modals-scripts')
        <script defer src="https://unpkg.com/@alpinejs/ui@3.10.4-beta.5/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/@alpinejs/focus@3.10.4/dist/cdn.min.js"></script>
    @endpush
@endonce
