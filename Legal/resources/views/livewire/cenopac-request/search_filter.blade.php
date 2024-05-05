<!-- Search -->
<div class="flex-1">
    <label class="input input-bordered flex items-center gap-2 w-fit">
        <input wire:model.live.debounce.300ms = 'search' type="text" class="grow" placeholder="Search"/>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
    </label>
</div>              
<!-- Search -->
<!-- Filter -->
<div class="flex gap-2 h-fit items-center justify-end">
    <label for="filter_status" class="block text-sm font-medium text-gray-900 w-14">Status:</label>
    <select wire:model.live="filter_status" id="filter_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-40 p-2.5 ">
        <option value='' select>All</option>
        <option value="Pending">Pending</option>
        <option value="For Release">For Release</option>
        <option value="Denied">Denied</option>
    </select>
</div>
<!-- Filter -->