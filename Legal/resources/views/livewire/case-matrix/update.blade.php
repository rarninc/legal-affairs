<dialog id="update_case_modal" class="modal" wire:ignore.self>
    <div class="modal-box w-11/12 max-w-5xl">
        <!-- Form -->
        <form method="dialog">
            <h3 class="font-bold text-xl">Update Case Record</h3>
            <button wire:click = "close" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <div class="flex py-2">
                <p>Provide data to the following fields. Click UPDATE when you’re done.</p>
                <button type="reset" class="bg-gray-300 rounded px-4 h-fit ml-auto text-gray-800 font-semibold hover:bg-gray-400">Reset Fields</button>
            </div>

            <div class="flex gap-4 my-4">
                <!-- Form Left -->
                <div class="flex flex-col w-full gap-2">
                    <div class="flex flex-col">
                        <label for="employee_name" class="block mb-2 text-sm font-medium text-gray-900">Name <span class="text-red-600">*</span> </label>
                        <input name = "employee_name" wire:model.defer="employee_name" id="employee_name" type="text" placeholder="Name" class="input input-bordered w-full input-md" />
                        @error('employee_name')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="case_title" class="block mb-2 text-sm font-medium text-gray-900">Case Title <span class="text-red-600">*</span> </label>
                        <input name = "case_title" wire:model.defer="case_title" id="case_title" type="text" placeholder="Case Title" class="input input-bordered w-full input-md" />
                        @error('case_title')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="charge" class="block mb-2 text-sm font-medium text-gray-900">Charge <span class="text-red-600">*</span> </label>
                        <input name = "charge" wire:model.defer="charge" id="charge" type="text" placeholder="Charge" class="input input-bordered w-full input-md" />
                        @error('charge')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="offense" class="block mb-2 text-sm font-medium text-gray-900">Offense <span class="text-red-600">*</span> </label>
                        <input name = "offense" wire:model.defer="offense" id="offense" type="text" placeholder="Offense" class="input input-bordered w-full input-md" />
                        @error('offense')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="assigned_officer" class="block mb-2 text-sm font-medium text-gray-900">Assigned Hearing Officer <span class="text-red-600">*</span> </label>
                        <input name = "assigned_officer" wire:model.defer="assigned_officer" id="assigned_officer" type="text" placeholder="Assigned Hearing Officer" class="input input-bordered w-full input-md" />
                        @error('assigned_officer')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- Form Left -->
                <!-- Form Right -->
                <div class="flex flex-col w-full gap-2">
                    <div class="flex flex-col">
                        <label for="case_docket" class="block mb-2 text-sm font-medium text-gray-900">Case Docket Number <span class="text-red-600">*</span> </label>
                        <input name = "case_docket" value="{{$editing_cm_docket}}" id="case_docket" type="text" placeholder="Case Docket Number" class="input input-bordered w-full input-md" disabled />
                    </div>
                    <div class="flex gap-3">
                        <div class="flex flex-col w-full">
                            <label for="date_issued" class="block mb-2 text-sm font-medium text-gray-900">Date Issued <span class="text-red-600">*</span></label>
                            <input name = "date_issued" wire:model.defer="date_issued" id="date_issued" type="date" placeholder="Date Issued" class="input input-bordered w-full input-md" />
                            @error('date_issued')
                            <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="date_resolved" class="block mb-2 text-sm font-medium text-gray-900">Date Resolved</label>
                            @if($this->status == "On-going")
                                <input name = "date_resolved" id="date_resolved" type="date" placeholder="Date Resolved" class="input input-bordered w-full input-md" disabled />
                            @else
                                <input name = "date_resolved" wire:model.live.debounce300ms="date_resolved" id="date_resolved" type="date" placeholder="Date Resolved" class="input input-bordered w-full input-md" />
                            @endif
                            @error('date_resolved')
                            <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                        <div class="flex w-full gap-4">
                            <div class="flex font-semibold">
                                <input wire:click = 'update_date_resolved("On-going")' name = "status" wire:model.live.debounce300ms="status" id="status" type="radio" id="Add On-going" name="radio-2" aria-label="On-going" value="On-going" class="btn btn-sm btn-wide" />
                            </div>
                            <div class="flex font-semibold">
                                <input wire:click = 'update_date_resolved("Resolved")' name = "status" wire:model.defer="status" id="status" type="radio" id="Add On-going" name="radio-2" aria-label="Resolved" value="Resolved" class="btn btn-sm btn-wide" />
                            </div>                                    
                        </div>
                        @error('status')
                            <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900">Remarks</label>
                        <textarea name = "remarks" wire:model.defer="remarks" id="remarks" class="textarea textarea-bordered" rows="4" placeholder="Enter Remarks..."></textarea>   
                        @error('remarks')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror   
                    </div>
                </div>
                <!-- Form Right -->
            </div>
        </form>
        <!-- Form -->
        <div class="flex justify-end mt-auto ">
            <button class="btn btn-success text-white" onclick="update_confirm.showModal()">Update</button>
            <dialog id="update_confirm" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-xl">Confirm Action</h3>
                    <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>UPDATE</strong> the case record?</strong>.</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-outline">Cancel</button>
                            <button wire:click = "update"  
                                    wire:loading.attr = "disabled"
                                    class="btn btn-success text-white">YES</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>
    </div>
</dialog>
