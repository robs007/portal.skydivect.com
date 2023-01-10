<div wire:loading.delay.class="opacity-50">
    <x-notify/>
    <x-layout.subpage header="Aircraft" subheader="Add Event">
        <form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200" method="POST">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <x-group for="title" label="Event Title" class="col-span-4" :error="$errors->first('event.title')">
                    <x-text wire:model.defer="event.title" id="title" :error="$errors->first('event.title')"/>
                </x-group>
                <x-group for="detail" label="Details" class="col-span-4" :error="$errors->first('event.detail')">
                    <x-text-area wire:model.defer="event.detail" id="detail" :error="$errors->first('event.detail')" />
                </x-group>
                <x-group for="start_date" label="Start Date" class="col-span-4" :error="$errors->first('event.start_date')">
                    <x-date wire:model="event.start_date" id="start_date" :error="$errors->first('event.start_date')" field="event.start_date" />
                </x-group>
                <x-group for="start_time" label="Start Time" class="col-span-4" :error="$errors->first('event.start_time')">
                    <x-selectbox wire:model="event.start_time" id="start_time" :error="$errors->first('event.start_time')" >
                        <option value="">Start Time</option>
                        <option value="7:00 am">7:00 am</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="9:00 am">9:00 am</option>
                        <option value="10:00 am">10:00 am</option>
                        <option value="11:00 am">11:00 am</option>
                    </x-selectbox>
                </x-group>

               <x-group for="end_date" label="End Date" class="col-span-4" :error="$errors->first('event.end_date')">
                    <x-date wire:model="event.end_date" id="end_date" :error="$errors->first('event.end_date')" field="event.end_date" />
                </x-group>
                <x-group for="has_registration" label="" class="col-span-4" :error="$errors->first('event.has_registration')">
                    <x-checkbox wire:model.defer="event.has_registration" id="has_registration" label="Charging Registration"/>
                </x-group>
                <x-group for="amount" label="Registration Cost" class="col-span-4" :error="$errors->first('event.cost')">
                    <x-text wire:model="event.cost" id="amount" icon="$" placeholder="50.00" :error="$errors->first('event.cost')" />
                </x-group>
                <x-group for="cost_detail" label="Cost Description" class="col-span-4" :error="$errors->first('event.cost_detail')">
                    <x-text wire:model.defer="event.cost_detail" id="cost_detail" help="Example: 10.00 per day" :error="$errors->first('event.cost_detail')" />
                </x-group>
                <x-group for="max" label="Participant Max" class="col-span-4" :error="$errors->first('event.max')">
                    <x-text type="number" wire:model.defer="event.max" id="max"  :error="$errors->first('event.max')" />
                </x-group>
                <x-group for="contact_name" label="Contact Name" class="col-span-4" :error="$errors->first('event.contact_name')">
                    <x-text  wire:model.defer="event.contact_name" id="contact_name"  :error="$errors->first('event.contact_name')" />
                </x-group>
                <x-group for="contact_email" label="Contact Email" class="col-span-4" :error="$errors->first('event.contact_email')">
                    <x-text  wire:model.defer="event.contact_email" id="contact_email"  :error="$errors->first('event.contact_email')" />
                </x-group>
                <x-group for="contact_phone" label="Contact phone" class="col-span-4" :error="$errors->first('event.contact_phone')">
                    <x-text  wire:model.defer="event.contact_phone" id="contact_phone"  :error="$errors->first('event.contact_phone')" />
                </x-group>

            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <x-notfiy-button-alert />
                    <button type="button"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancel
                    </button>
                    <x-button-loading message="Saving New Event..." buttontype="submit">Save</x-button-loading>
                </div>
            </div>

        </form>
        @json($event)
    </x-layout.subpage>
</div>
