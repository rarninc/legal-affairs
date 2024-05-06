<div class = "h-full flex flex-col">
    @if(session('success'))
        <div class="toast toast-top toast-center">                
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{session('success')}}</span>
            </div>
        </div>
    @endif
    <!-- Add Document Record Modal -->
    <dialog id="add_document_modal" class="modal" wire:ignore.self>
        <div class="modal-box w-11/12 max-w-5xl">
            <!-- Form -->
            <form method="dialog">
                <h3 class="font-bold text-xl">Add Document Record</h3>
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
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
                            <select wire:model = 'document_type' class="select select-bordered" id="document_type">
                                <option disabled value="" selected>Pick one</option>
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
                            <label for="to" class="block mb-2 text-sm font-medium text-gray-900">To (Name / Office) </label>
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
                                <input wire:model.defer = 'date_released' id="date_released" type="date" placeholder="Date Released" class="input input-bordered w-full input-md" />
                                @error('date_released')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                            <div class="flex w-full justify-between">
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'status' id="status" type="radio" id="Add To-Do" name="radio-2" aria-label="To-Do" value="To-Do" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'status' id="status" type="radio" id="Add Doing" name="radio-2" aria-label="Doing" value="Doing" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input wire:model.defer = 'status' id="status" type="radio" id="Add Done" name="radio-2" aria-label="Done" value="Done" class="btn btn-sm w-36" />
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
                    </div>
                    <!-- Form Right -->
                </div>
                <!-- Form Fields --> 
            </form>
            <!-- Form -->
            <div class="flex justify-end mt-auto ">
                <button class="btn bg-indigo-800 btn-primary text-white" onclick="add_document_confirm.showModal()">Add</button>
                <dialog id="add_document_confirm" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-xl">Confirm Action</h3>
                        <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>ADD</strong> a new document record?</strong>.</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn btn-outline">Cancel</button>
                                <button wire:click = 'create' class="btn btn-primary" onclick="add_document_confirm.close()" > YES</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </dialog>
    <!-- Add Document Record Modal-->
    
    
    <!-- Update Document Record Modal-->
    @include('livewire.document-tracker.update')


    <!-- View Document -->
    <dialog id="view_document" class="modal">
        <div class="modal-box w-11/12 max-w-full scroll-container">
            <div class="h-full relative">
                <img src="storage/img/background.png" alt="view bg" class="absolute h-full w-full rounded-xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <div class="flex justify-center pt-4">
                    <div class="card w-3/5 bg-indigo-800 shadow-xl">
                        <div class="card-body h-full flex flex-col p-4">
                            <h3 class="font-bold text-2xl text-white text-center">Document Record</h3>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pb-4">
                    <div class="card w-3/5 mt-4 bg-base-200 shadow-xl">
                        <div class="card-body h-full flex flex-col p-5">
                            <div class="flex px-5 gap-4 justify-center">
                                <div class="flex flex-col w-1/4">
                                    <div class="h-6 mb-2"><i>Tracking Number:</i></div>
                                    <div class="h-6 mb-1"><i>Document Title:</i></div>
                                    <div class="h-6 mb-1"><i>Document Type:</i></div>
                                    <div class="h-6 mb-1"><i>From (Name / Office):</i></div>
                                    <div class="h-6 mb-1"><i>To (Name / Office):</i></div>
                                    <div class="h-6 mb-1"><i>Date Received:</i></div>
                                    <div class="h-6 mb-1"><i>Date Released:</i></div>
                                    <div class="h-6 mb-1"><i>Status:</i></div>
                                    <div class="h-6 mb-1"><i>Remarks:</i></div>
                                </div>
                                <div class="font-bold w-3/4">
                                    <div class="h-6 mb-2"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1"></div>
                                    <div class="h-6 mb-1 flex items-center">
                                        <div class="badge badge-warning">Doing</div>
                                    </div>
                                    <div class="h-auto mb-1 scroll-container overflow-auto"></div>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>
            <div class="divider"></div> 
            <div>
                <h3 class="font-bold text-2xl text-center mb-4">Document History</h3>
                <!-- Case History Table -->
                <div class="card w-full mt-4 bg-base-100 shadow-xl flex-1">
                    <div class="card-body h-96 flex flex-col p-5">
                        <div class="scroll-container w-full overflow-auto rounded-lg">
                            <table class="table table-zebra">
                                <!-- head -->
                                <thead class="bg-neutral-300 sticky top-0 z-0">
                                    <tr class="text-black text-sm">
                                        <th>Action</th>
                                        <th>Version</th>
                                        <th>Date Updated</th>
                                        <th>Tracking Number</th>
                                        <th>Document Title</th>
                                        <th>Document Type</th>
                                        <th>From (Name / Office)</th>
                                        <th>To (Name / Office)</th>
                                        <th>Date Received</th>
                                        <th>Date Released</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover">
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>         
                </div>
                <!-- Case History Table -->
            </div>
            
        </div>
    </dialog>
    <!-- View Document -->


    <!-- Document List -->
    <div class="card w-full bg-base-100 shadow-xl flex-1">
        <div class="card-body h-1 flex flex-col p-5">
            <div class="mb-2 w-full gap-2 flex flex-col items-center">
                <!-- Search and Filter-->
                @include('livewire.document-tracker.search-filter')
                <!-- Search and Filter-->
            </div>
            <!-- Card Options -->
            <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                <div class="flex flex-col h-1 gap-2">
                @include('livewire.document-tracker.document-list')
                </div>
            </div>
            <!-- Card Options -->
        </div>         
    </div>
    <!-- Document List -->

</div>