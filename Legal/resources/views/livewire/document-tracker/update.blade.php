<!-- Update Document Record Modal-->
<dialog id="update_document_modal" class="modal" wire:ignore.self>
    <div class="modal-box w-11/12 max-w-5xl">
        <!-- Form -->
        <form method="dialog">
            <h3 class="font-bold text-xl">Update Document Record</h3>
            <button wire:click = 'close' class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <div class="flex py-2">
                <p>Provide data to the following fields. Click UPDATE when you’re done.</p>
                <button type="reset" class="bg-gray-300 rounded px-4 h-fit ml-auto text-gray-800 font-semibold hover:bg-gray-400">Reset Fields</button>
            </div>
            <!-- Form Fields -->    
            <div class="flex gap-4 my-4">
                <!-- Form Left -->
                <div class="flex flex-col w-full gap-2">
                    <div class="flex flex-col">
                        <label for="tracking_no" class="block mb-2 text-sm font-medium text-gray-900">Tracking Number <span class="text-red-600">*</span> </label>
                        <input wire:model.defer = 'tracking_no' id="tracking_no" type="text" placeholder="YYYY-XXXX-XXXX-XXXX" class="input input-bordered w-full input-md" />
                        @error('tracking_no')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="document_title" class="block mb-2 text-sm font-medium text-gray-900">Document Title <span class="text-red-600">*</span> </label>
                        <input wire:model.defer = 'document_title' id="document_title" type="text" placeholder="Document Title" class="input input-bordered w-full input-md" />
                        @error('document_title')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900">Document Type <span class="text-red-600">*</span> </label>
                        <select wire:model.defer = 'document_type' class="select select-bordered" id="document_type">
                            <option disabled selected>Pick one</option>
                            <option value="MOA">Memorandum of Agreement (MOA)</option>
                            <option value="Contract">Contract</option>
                            <option value="Legal Request">Legal Request</option>
                            <option value="Others">Others</option>
                        </select>
                        @error('document_type')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="from" class="block mb-2 text-sm font-medium text-gray-900">From (Name / Office) <span class="text-red-600">*</span> </label>
                        <input wire:model.defer = 'from_office' id="from" type="text" placeholder="Name / Office" class="input input-bordered w-full input-md" />
                        @error('from_office')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="to" class="block mb-2 text-sm font-medium text-gray-900">To (Name / Office) <span class="text-red-600">*</span> </label>
                        <input wire:model.defer = 'to_office' id="to" type="text" placeholder="Assigned Hearing Officer" class="input input-bordered w-full input-md" />
                        @error('to_office')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- Form Left -->
                <!-- Form Right -->
                <div class="flex flex-col w-full gap-2">
                    <div class="flex gap-3">
                        <div class="flex flex-col w-full">
                            <label for="date_received" class="block mb-2 text-sm font-medium text-gray-900">Date Received <span class="text-red-600">*</span></label>
                            <input wire:model.defer = 'date_received' id="date_received" type="date" placeholder="Date Received" class="input input-bordered w-full input-md" />
                            @error('date_received')
                            <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="date_released" class="block mb-2 text-sm font-medium text-gray-900">Date Released</label>
                            @if ($this->status == 'Done')
                                <input wire:model.live.debounce150ms = 'date_released' id="date_released" type="date" placeholder="Date Released" class="input input-bordered w-full input-md" />
                            @else
                                <input value = {{null}} id="date_released" type="date" placeholder="Date Released" class="input input-bordered w-full input-md" disabled/>
                            @endif
                            @error('date_released')
                            <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                        <div class="flex w-full justify-between">
                            <div class="flex font-semibold">
                                <input wire:click = 'update_date_released("To-Do")' wire:model.live.debounce300ms = 'status' id="status" type="radio" id="Add To-Do" name="radio-2" aria-label="To-Do" value="To-Do" class="btn btn-sm w-36" />
                            </div>
                            <div class="flex font-semibold">
                                <input wire:click = 'update_date_released("Doing")' wire:model.live.debounce300ms = 'status' id="status" type="radio" id="Add Doing" name="radio-2" aria-label="Doing" value="Doing" class="btn btn-sm w-36" />
                            </div>
                            <div class="flex font-semibold">
                                <input wire:click = 'update_date_released("Done")' wire:model.live.debounce300ms = 'status' id="status" type="radio" id="Add Done" name="radio-2" aria-label="Done" value="Done" class="btn btn-sm w-36" />
                            </div>                                 
                        </div>
                        @error('status')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900">Remarks</label>
                        <textarea wire:model.defer = 'remarks' id="remarks" class="textarea textarea-bordered" rows="5" placeholder="Enter Remarks..."></textarea>    
                        @error('remarks')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    @if($this->status == 'To-Do')
                        <div class="flex flex-col">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Priority <span class="text-red-600">*</span></label>
                            <div class="flex w-full gap-4">
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'priority' name = "priority" id="priority" type="radio" id="Add Urgent" name="radio-2" aria-label="Urgent" value="Urgent" class="btn btn-sm btn-wide" />
                                </div>
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'priority' name = "priority" id="priority" type="radio" id="Add Nonurgent" name="radio-2" aria-label="Nonurgent" value="Non-Urgent" class="btn btn-sm btn-wide" />
                                </div>                                    
                            </div>   
                        @error('priority')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                        </div>
                    @endif

                    @if($this->status == 'Doing')
                        <div class="flex flex-col">
                            <label for="progress" class="block mb-2 text-sm font-medium text-gray-900">Progress</label>
                            <input wire:model.defer = 'progress_no' type="range" min="0" max="80" value="0" class="range range-xs w-full" step="20" />
                            <div class="w-full flex justify-between text-xs px-2">
                                <span>0</span>
                                <span>20</span>
                                <span>40</span>
                                <span>60</span>
                                <span>80</span>
                            </div>  
                        </div>
                        
                        <div class="flex flex-col">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Priority <span class="text-red-600">*</span></label>
                            <div class="flex w-full gap-4">
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'priority' name = "priority" id="priority" type="radio" id="Add Urgent" name="radio-2" aria-label="Urgent" value="Urgent" class="btn btn-sm btn-wide" />
                                </div>
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'priority' name = "priority" id="priority" type="radio" id="Add Nonurgent" name="radio-2" aria-label="Nonurgent" value="Non-Urgent" class="btn btn-sm btn-wide" />
                                </div>                                    
                            </div>   
                            @error('priority')
                            <span class="text-red-500"> {{$message}}</span>
                            @enderror
                        </div>
                    @endif
                </div>
                <!-- Form Right -->
            </div>
            <!-- Form Fields --> 
        </form>
        <!-- Form -->
        <div class="flex justify-end mt-auto ">
            <button class="btn btn-success text-white" onclick="update_document_confirm.showModal()">Update</button>
            <dialog id="update_document_confirm" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-xl">Confirm Action</h3>
                    <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>UPDATE</strong> a new document record?</strong>.</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn btn-outline">Cancel</button>
                            <button wire:click = 'update_doc' 
                                    wire:loading.attr = "disabled"
                                    class="btn btn-primary" >YES</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>
    </div>
</dialog>
<!-- Update Document Record Modal-->