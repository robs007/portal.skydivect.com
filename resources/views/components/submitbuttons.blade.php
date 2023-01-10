@props([
	'message'=> 'Saving'
])
<div class="pt-5">
    <div class="flex justify-end">
        <x-notfiy-button-alert />
        <button type="button"
                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Cancel
        </button>
        <x-button-loading message="{{$message}}" buttontype="submit">Save</x-button-loading>
    </div>
</div>
