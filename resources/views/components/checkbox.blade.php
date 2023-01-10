@props([
    'class' => false,
    'for' => false,
    'label' => false
])
<div class="flex items-center h-5">
    <input {{$attributes->merge()}}
           type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
</div>
