<div>
    <div class="col-span-6 sm:col-span-4">
        <div
            x-data="Components.listbox({ modelName: 'selected', open: true, selectedIndex: 3, activeIndex: 3, items: [{&quot;id&quot;:1,&quot;name&quot;:&quot;Wade Cooper&quot;,&quot;online&quot;:true},{&quot;id&quot;:2,&quot;name&quot;:&quot;Arlene Mccoy&quot;,&quot;online&quot;:false},{&quot;id&quot;:3,&quot;name&quot;:&quot;Devon Webb&quot;,&quot;online&quot;:false},{&quot;id&quot;:4,&quot;name&quot;:&quot;Tom Cook&quot;,&quot;online&quot;:true},{&quot;id&quot;:5,&quot;name&quot;:&quot;Tanya Fox&quot;,&quot;online&quot;:false},{&quot;id&quot;:6,&quot;name&quot;:&quot;Hellen Schmidt&quot;,&quot;online&quot;:true},{&quot;id&quot;:7,&quot;name&quot;:&quot;Caroline Schultz&quot;,&quot;online&quot;:true},{&quot;id&quot;:8,&quot;name&quot;:&quot;Mason Heaney&quot;,&quot;online&quot;:false},{&quot;id&quot;:9,&quot;name&quot;:&quot;Claudie Smitham&quot;,&quot;online&quot;:true},{&quot;id&quot;:10,&quot;name&quot;:&quot;Emil Schaefer&quot;,&quot;online&quot;:false}] })"
            x-init="init()">
            <label id="listbox-label"
                   class="block text-sm font-medium text-gray-700"
                   @click="$refs.button.focus()">
                Assigned to
            </label>
            <div class="mt-1 relative">
                <button type="button"
                        class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        x-ref="button"
                        @keydown.arrow-up.stop.prevent="onButtonClick()"
                        @keydown.arrow-down.stop.prevent="onButtonClick()"
                        @click="onButtonClick()" aria-haspopup="listbox"
                        :aria-expanded="open" aria-expanded="true"
                        aria-labelledby="listbox-label">
        <span class="flex items-center">
          <span aria-label="Online" :aria-label="selected.online ? 'Online' : 'Offline'"
                :class="{ 'bg-green-400': selected.online, 'bg-gray-200': !(selected.online) }"
                class="bg-green-400 flex-shrink-0 inline-block h-2 w-2 rounded-full"></span>
          <span x-text="selected.name" class="ml-3 block truncate">Tom Cook</span>
        </span>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/selector"
               xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd"
        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
</svg>
        </span>
                </button>


                <ul x-show="open"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                    x-max="1" @click.away="open = false"
                    x-description="Select popover, show/hide based on select state."
                    @keydown.enter.stop.prevent="onOptionSelect()"
                    @keydown.space.stop.prevent="onOptionSelect()"
                    @keydown.escape="onEscape()"
                    @keydown.arrow-up.prevent="onArrowUp()"
                    @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                    tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                    :aria-activedescendant="activeDescendant"
                    aria-activedescendant="">

                    <li x-state:on="Highlighted" x-state:off="Not Highlighted"
                        class="cursor-default select-none relative py-2 pl-3 pr-9 text-gray-900"
                        x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation."
                        id="listbox-option-0" role="option" @click="choose(0)"
                        @mouseenter="activeIndex = 0"
                        @mouseleave="activeIndex = null"
                        :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                        <div class="flex items-center">
                                                                    <span x-state:on="Online" x-state:off="Not Online"
                                                                          :class="{ 'bg-green-400': true, 'bg-gray-200': !true }"
                                                                          class="bg-green-400 flex-shrink-0 inline-block h-2 w-2 rounded-full"
                                                                          aria-hidden="true"></span>
                            <span x-state:on="Selected"
                                  x-state:off="Not Selected"
                                  class="font-normal ml-3 block truncate"
                                  :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                  Wade Cooper
                  <span class="sr-only"> is online</span>
                </span>
                        </div>

                        <span
                            x-description="Checkmark, only display for selected option."
                            x-state:on="Highlighted"
                            x-state:off="Not Highlighted"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                            :class="{ 'text-white': activeIndex === 0, 'text-indigo-600': !(activeIndex === 0) }"
                            x-show="selectedIndex === 0" style="display: none;">
                <svg class="h-5 w-5" x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd"
        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
        clip-rule="evenodd"></path>
</svg>
              </span>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>
