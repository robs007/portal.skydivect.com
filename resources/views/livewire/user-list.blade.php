<div class="flex-col">
    <x-notify/>
    <div class="" style="">
        <div class="bg-gray-100 py-10">
            <div class="mx-auto max-w-7xl">

                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                            <x-breadcrunb.breadcrumb crumbs="1">
                                <x-slot:urlhome>/</x-slot:urlhome>
                                <x-slot:homelabel>Home</x-slot:homelabel>
                            </x-breadcrunb.breadcrumb>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none sm:mr-3">
                            <x-button href="{{route('participant-add', $event->id ?? '')}}" label="Add" info right-icon="plus" rounded />

                        </div>
                    </div>
                    <div
                        class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300" wire:loading.class="opacity-50" >
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Name
                                </th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Email
                                </th>
                                <th scope="col"
                                    class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                    Verified
                                </th>
                                <th scope="col"
                                    class=" hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                    Admin
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($users as $user)
                                <tr>
                                    <td class="  py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                        {{$user->name ?? ''}}
                                        <dl class="font-normal lg:hidden">
                                            <dt class="sr-only">Participant</dt>
                                            <dt class="sr-only sm:hidden">Event</dt>
                                            <dd class="mt-1 truncate text-gray-500 hover:bg-gray-100">{{$user->email ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">{{$user->email_verified_at ?? ''}}</dd>
                                            <dd class="mt-1 truncate text-gray-500">Admin: {{$user->is_admin ?? ''}}</dd>

                                        </dl>
                                    </td>
                                    <td class="hidden w-60 flex-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">{{$user->email ?? ''}}</td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{$user->email_verified_at ?? ''}}</td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{($user->is_admin) ?'Yes': 'No'}}</td>
                                    <td class="py-4 w-8 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <div class="flex flex-row justify-between">
                                            <div class="flex flex-col">
                                                <a href="{{route('profile.show')}}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    <x-icon name="pencil-alt" class="w-5 h-5"/>
                                                    <span class="sr-only"></span></a>
                                            </div>
                                            <div class="flex flex-col px-5">
                                                <a href="#" wire:click="deleteRecord({{$user->id}})"
                                                   class="text-red-700 hover:text-indigo-900">
                                                    <x-icon wire:loading.remove name="trash" class="w-5 h-5"/>
                                                    <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                </a>
                                            </div>
                                            <div class="flex flex-col">
                                                <a href="#"
                                                   class="text-green-700 hover:text-indigo-900">
                                                    <x-icon wire:loading.remove name="eye" class="w-5 h-5"/>
                                                    <x-wireui::icons.spinner wire:loading.delay class="w-5 h-5"/>
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6" > No Participants for this event</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot class="bg-white">
                            <tr>
                                <th scope="row"  class="pl-6 pr-3 pt-3 pb-3 text-right text-sm font-normal text-gray-500 sm:table-cell md:pl-0">Total Participants {{$users->count() ?? 0}}</th>
                                <th scope="row" class="pl-4 pr-3 pt-3 pb-3 text-left text-sm font-normal text-gray-500"></th>
                                <td class="hidden pl-3 pr-4 pt-0 text-right text-sm text-gray-500 sm:pr-6 md:pr-0 sm:table-cell"></td>
                                <td class="hidden pl-3 pr-4 pt-0 text-right text-sm text-gray-500 sm:pr-6 md:pr-0 sm:table-cell"></td>
                                <td class="hidden pl-3 pr-4 pt-0 text-right text-sm text-gray-500 sm:pr-6 md:pr-0 sm:table-cell">
                                    <span class="px-3">


                                    </span>
                                </td>
                            </tr>

                            </tfoot>
                        </table>
                        <div class="mt-2 p-3">
                            {{$users->links()}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
