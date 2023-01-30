<div wire:loading.delay.class="opacity-50">
    <x-notify/>
    <x-layout.subpage header="Participant Edit" subheader="Edit {{$participant->firstname}} {{$participant->lastname}}">
        <form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200" method="POST">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <x-group for="firstname" label="First Namr" class="col-span-4" :error="$errors->first('participant.firstname')">
                    <x-text wire:model.defer="participant.firstname" id="title" :error="$errors->first('participant.firstname')"/>
                </x-group>
                <x-group for="lastname" label="Last Name" class="col-span-4" :error="$errors->first('participant.lastname')">
                    <x-text wire:model.defer="participant.lastname" id="lastname" :error="$errors->first('participant.lastname')" />
                </x-group>
                <x-group for="email" label="Email" class="col-span-4" :error="$errors->first('participant.email')">
                    <x-text wire:model="participant.email" id="email" :error="$errors->first('participant.email')"  />
                </x-group>
                <x-group for="phone" label="Cell Phone" class="col-span-4" :error="$errors->first('participant.phone')">
                    <x-text wire:model="participant.phone" id="phone" :error="$errors->first('participant.phone')"  />
                </x-group>
                <x-group for="jumps" label="Jumps" class="col-span-4" :error="$errors->first('participant.jumps')">
                    <x-text wire:model="participant.jumps" id="jumps" :error="$errors->first('participant.jumpse')" />
                </x-group>
                <x-group for="amount" label="Registration Cost" class="col-span-4" :error="$errors->first('participant.amount')">
                    <x-text wire:model="participant.amount" id="amount" icon="$"  :error="$errors->first('participant.amount')" />
                </x-group>
                <x-select class="col-span-4" label="Event" wire:model.defer="participant.event_id" :options="$events" option-label="title_ext" option-value="id">

                </x-select>

                <input type="hidden" wire:model="participant.user_id">
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <x-notfiy-button-alert />
                    <a href="{{route('participant-list',$participant->event_id)}}"
                       class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancel
                    </a>
                    <x-button-loading message="Saving New participant..." buttontype="submit">Save</x-button-loading>
                </div>
            </div>

        </form>

    </x-layout.subpage>
</div>
