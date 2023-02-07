<div wire:loading.delay.class="opacity-50">
    <x-notify/>
    <x-layout.subpage header="Events" subheader="Add User">
        <form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200" method="POST">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <x-group for="name" label="Name" class="col-span-4" :error="$errors->first('name')">
                    <x-text wire:model.defer="name" id="title" :error="$errors->first('name')"/>
                </x-group>
                <x-group for="email" label="Email" class="col-span-4" :error="$errors->first('email')">
                    <x-text wire:model.defer="email" id="email" :error="$errors->first('email')" />
                </x-group>
                <x-group for="password" label="Password" class="col-span-4" :error="$errors->first('password')">
                    <x-text name="password" wire:model.defer="password" id="password" :error="$errors->first('password')"  />
                </x-group>

                 <x-group for="password_confirmation" label="Confirm Password" class="col-span-4" :error="$errors->first('password_confirmation')">
                    <x-text wire:model.defer="password_confirmation" name="password_confirmation" id="password_confirmation" :error="$errors->first('password_confirmation')"  />
                </x-group>

                <x-group for="is_admin" label="" class="col-span-4" :error="$errors->first('is_admin')">
                    <x-checkbox wire:model.defer="is_admin" id="is_admin" label="Admin"/>
                </x-group>


            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <x-notfiy-button-alert />
                    <a href="{{route('users-list')}}"
                       class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancel
                    </a>
                    <x-button-loading message="Saving New Event..." buttontype="submit">Save</x-button-loading>
                </div>
            </div>

        </form>

    </x-layout.subpage>
</div>
