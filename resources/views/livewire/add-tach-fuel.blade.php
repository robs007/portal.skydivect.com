<div wire:loading.delay.class="opacity-50">
    <x-notify/>
    <x-layout.subpage header="Aircraft" subheader="Add Tach/Fuel">
        <form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200" method="POST">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <x-group label="Aircraft" for="aircraft_id" class="sm:col-span-4" :error="$errors->first('tach.aircraft_id')">
                    <x-selectbox wire:model="tach.aircraft_id" id="aircraft" :error="$errors->first('tach.aircraft_id')">
                        <option>Select Aircraft</option>
                        @foreach($aircraft as $plane)
                            <option value="{{$plane->plane_id}}">{{$plane->name}}</option>
                        @endforeach
                    </x-selectbox>
                </x-group>

                <x-group label="Tach" for="tach" class="sm:col-span-4" :error="$errors->first('tach.tach')">
                    <x-text wire:model.defer="tach.tach" name="tach" :error="$errors->first('tach.tach')"/>
                </x-group>

                <x-group label="Fuel Used" for="gals" class="sm:col-span-4" :error="$errors->first('tach.gals')">
                    <x-text wire:model.defer="tach.gals" id="gals" :error="$errors->first('tach.gals')"/>
                </x-group>

                <x-group label="Pilot" for="pilot" class="sm:col-span-4" :error="$errors->first('pilot_id')">
                    <x-selectbox wire:model.defer="tach.pilot_id" id="pilot"  field="tach.pilot_id" :error="$errors->first('pilot_id')" >
                        <option value="">Select Pilot</option>
                        @foreach($pilots as $pilot)
                            <option value="{{$pilot->id}}">{{$pilot->name}}</option>
                        @endforeach
                    </x-selectbox>
                </x-group>

                <x-group label="Date" for="tach_date" class="sm:col-span-4" :error="$errors->first('tach.tach_date')">
                    <x-date wire:model="tach.tach_date" id="tach_date" field="tach.tach_date"
                            :error="$errors->first('tach.tach_date')"/>
                </x-group>
                <input type="hidden" wire:model="tach.user_id" value="{{Auth::id()}}">
            </div>
{{--            <x-submitbuttons/>--}}
            <div class="pt-5">
                <div class="flex justify-end">
                    <x-notfiy-button-alert />
                    <button type="button"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancel
                    </button>
                    <x-button-loading message="Saving Tach-Fuel..." buttontype="submit">Save</x-button-loading>
                </div>
            </div>

        </form>

    </x-layout.subpage>
</div>
