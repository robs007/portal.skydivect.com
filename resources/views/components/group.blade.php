@props([
    'label',
    'for',
    'error' => false,
])


<div {{$attributes}}>
    <label for="{{$for}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
        {{$slot}}
    @if($error)
        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $error }}</p>
    @endif
</div>
