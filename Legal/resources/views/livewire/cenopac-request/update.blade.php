<dialog id="update_cenopac_req_modal" class="modal" wire:ignore.self>
    <div class="modal-box w-fit max-w-5xl">
        <!-- Form -->
        <form method="dialog">
            <h3 class="font-bold text-xl">Update CeNoPAC Request</h3>
            <button wire:click = "close" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <div class="flex py-2 gap-2">
                <p>Provide data to the following fields. Click UPDATE when you're done.</p>
                <button type="reset" class="bg-gray-300 rounded px-4 h-fit ml-auto text-gray-800 font-semibold hover:bg-gray-400">Reset Fields</button>
            </div>
            <!-- Form Fields -->
            <div class="flex gap-4 my-4">
                <div class="flex flex-col w-full gap-2">
                    <div class="flex flex-col">
                        <label for="employee_name" class="block mb-2 text-sm font-medium text-gray-900">Employee Name <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='employee_name' id="employee_name" type="text" placeholder="Name" class="input input-bordered w-full input-md" />
                        @error('employee_name')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Office / College <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='originating_office' id="case_title" type="text" placeholder="Office / College" class="input input-bordered w-full input-md" />
                        @error('originating_office')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900">Position <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='position' id="charge" type="text" placeholder="Position" class="input input-bordered w-full input-md" />
                        @error('position')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="c" class="block mb-2 text-sm font-medium text-gray-900">Purpose <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='purpose' id="purpose" type="text" placeholder="Purpose" class="input input-bordered w-full input-md" />
                        @error('purpose')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex gap-4 items-center">
                        <div class="flex flex-col w-full">
                            <label for="date_requested" class="block mb-2 text-sm font-medium text-gray-900">Date Requested <span class="text-red-600">*</span></label>
                            <input id="date_requested" type="date" value="{{$this->date_requested}}" placeholder="Date Issued" class="input input-bordered w-full input-md" disabled/>
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                            <div class="flex w-full gap-4">
                                <div class="flex font-semibold">
                                    <input name = "status" wire:model.defer="status" id="status" type="radio" id="Add Pending" name="radio-2" aria-label="Pending" value="Pending" class="btn btn-sm" />
                                </div>
                                <div class="flex font-semibold">
                                    <input name = "status" wire:model.defer="status" id="status" type="radio" id="Add For Release" name="radio-2" aria-label="For Release" value="For Release" class="btn btn-sm" />
                                </div>
                                <div class="flex font-semibold">
                                    <input name = "status" wire:model.defer="status" id="status" type="radio" id="Add Denied" name="radio-2" aria-label="Denied" value="Denied" class="btn btn-sm" />
                                </div>                                 
                            </div>
                            @error('status')
                                <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form Fields -->
        </form>
        <!-- Form -->
        <div class="flex justify-center mt-auto">
            <button class="btn btn-wide btn-success text-white" onclick="update_request_confirm.showModal()">Update</button>
            <dialog id="update_request_confirm" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-xl">Confirm Action</h3>
                    <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>UPDATE</strong> the request?</strong>.</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-outline">Cancel</button>
                            <button wire:click = "update"  class="btn btn-success text-white">YES</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>
    </div>
</dialog>