@props([
	'header' => '',
	'subheader' => '',
	'subheadertext' => ''
])

<header class="bg-gray-200 shadow hidden md:block">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$header}}
        </h2>
    </div>
</header>
<div class="sm:py-12 py-0.5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div x-data="{ open: false }">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Replace with your content -->
                    <div class="" style="">
                        <div class="bg-white-100 py-2 sm:py-11">
                            <div class="mx-auto max-w-7xl">

                                <div class="px-4 sm:px-6 lg:px-8">

                                    <div class="flex flex-row items-center justify-between">
                                        <div class=" ">
                                            <h1 class="text-xl font-semibold text-gray-900">{{$subheader}}</h1>
                                            <p class="mt-2 text-sm text-gray-700">{{$subheadertext}}</p>
                                        </div>
                                    </div>
                                    <div>
                                        {{$slot}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
