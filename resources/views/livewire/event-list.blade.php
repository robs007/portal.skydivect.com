<div class="flex-col">
    <x-notify/>
    <x-dialog z-index="z-50" blur="md" align="left" />
    <div class="" style="">
        <div class="bg-gray-100 py-10">
            <div class="mx-auto max-w-7xl">

                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Events</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all Events.</p>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                            <x-select
                                label="Filter"
                                placeholder="Select Service(s)"

                                wire:model="filter"
                                class="w-full"
                            >
                                <x-select.option label="Current" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" />
                                <x-select.option label="All" value="2022-01-01" />
                            </x-select>

                        </div>
                    </div>
                    <div
                        class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300" wire:loading.class="opacity-50" >
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Date
                                </th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Event
                                </th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Detail
                                </th>
                                <th scope="col"
                                    class=" hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                    Start Time
                                </th>
                                <th scope="col"
                                    class=" hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                    Cost
                                </th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Cost Detail
                                </th>
                                 <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Current / Max
                                </th>
                                  <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Contact Name
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($events as $event)
                                <tr>
                                    <td class="  py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:w-auto sm:max-w-none sm:pl-6">
                                        {{$event->start_date ?? ''}}
                                        <dl class="font-normal lg:hidden">
                                            <dt class="sr-only">Event</dt>
                                            {{--                                                <dd class="mt-1 truncate text-gray-700">{{$event->tach ?? ''}}</dd>--}}
                                            <dt class="sr-only sm:hidden">Event</dt>
                                            <dd class="mt-1 truncate text-gray-900 hover:bg-gray-100 font-bold">{{$event->title ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">${{$event->cost ?? ''}} {{$event->cost_detail ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">Current / Max {{$event->current ?? ''}} / {{$event->max ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">{{$event->contact_name ?? ''}}</dd>
                                            <dd class="mt-1">
                                                <div class="flex flex-row justify-between">
                                                    <div class="flex flex-col">
                                                        <a href="{{route('event-edit', $event->id)}}"
                                                           class="text-indigo-600 hover:text-indigo-900">
                                                            <x-icon name="pencil-alt" class="w-5 h-5"/>
                                                            <span class="sr-only"></span></a>
                                                    </div>
                                                    <div class="flex flex-col px-5">
                                                        <a href="#" wire:click="deleteRecord({{$event->id}})"
                                                           class="text-red-700 hover:text-indigo-900">
                                                            <x-icon wire:loading.remove name="trash" class="w-5 h-5"/>
                                                            <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                        </a>
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <a href="{{route('participant-list', $event->id)}}" class="text-green-700 hover:text-indigo-900">
                                                            <x-icon wire:loading.remove name="eye" class="w-5 h-5"/>
                                                            <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </dd>
                                        </dl>
                                    </td>
                                    <td class="hidden w-60 flex-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell font-bold">{{$event->title ?? ''}}</td>
                                    <td class="hidden w-60 flex-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">{{$event->detail ?? ''}}</td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{$event->start_time ?? ''}}</td>
                                    <td class="hidden py-4 text-sm text-gray-500 lg:table-cell">{{$event->cost ?? ''}}</td>
                                    <td class="hidden py-4 text-sm text-gray-500 lg:table-cell">{{$event->cost_detail ?? ''}}</td>
                                    <td class="hidden py-4 text-sm text-gray-500 lg:table-cell">{{$event->current ?? ''}} / {{$event->max ?? ''}}</td>
                                    <td class="hidden py-4 text-sm text-gray-500 lg:table-cell">{{$event->contact_name ?? ''}}
                                        <dl class="font-normal">
                                            <dt class="sr-only">Tach</dt>
                                            <dt class="sr-only sm:hidden">Aircraft</dt>
                                            <dd class="mt-1 truncate text-gray-500">{{$event->contact_phone ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">{{$event->contact_email ?? ''}}</dd>

                                        </dl>
                                    </td>
                                    <td class="hidden py-4 w-8 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:table-cell">
                                        <div class="flex flex-row justify-between">
                                            <div class="flex flex-col">
                                                <a href="{{route('event-edit', $event->id)}}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <x-icon name="pencil-alt" class="w-5 h-5"/>
                                                    <span class="sr-only"></span></a>
                                            </div>
                                            <div class="flex flex-col px-5">
                                                <a href="#" wire:click="deleteRecord({{$event->id}})"
                                                   class="text-red-700 hover:text-indigo-900">
                                                    <x-icon wire:loading.remove name="trash" class="w-5 h-5"/>
                                                    <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                </a>
                                            </div>
                                            <div class="flex flex-col">
                                                <a href="{{route('participant-list', $event->id)}}" class="text-green-700 hover:text-indigo-900">
                                                    <x-icon wire:loading.remove name="eye" class="w-5 h-5"/>
                                                    <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2 p-3">
                            {{$events->links()}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
