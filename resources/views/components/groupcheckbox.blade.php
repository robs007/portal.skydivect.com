    @props([
    'for' => false,
    'label' => false
])
    <div {{$attributes}}>
        <div class="relative flex items-start mt-5">
            <div class="ml-3 text-sm">
                {{$slot}}
                <label for="{{$for}}" class="font-medium text-gray-700">{{$label}}</label>
            </div>
        </div>
    </div>


