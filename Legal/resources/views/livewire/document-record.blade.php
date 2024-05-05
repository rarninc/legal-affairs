<div class = "h-full flex flex-col">

    <!-- Add Document Record Modal -->
    <dialog id="add_document_modal" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <!-- Form -->
            <form method="dialog">
                <h3 class="font-bold text-xl">New Document Record</h3>
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                <div class="flex py-2">
                    <p>Provide data to the following fields. Click ADD when you’re done.</p>
                    <button type="reset" class="bg-gray-300 rounded px-4 h-fit ml-auto text-gray-800 font-semibold hover:bg-gray-400">Reset Fields</button>
                </div>
                <!-- Form Fields -->    
                <div class="flex gap-4 my-4">
                    <!-- Form Left -->
                    <div class="flex flex-col w-full gap-2">
                        <div class="flex flex-col">
                            <label for="tracking_no" class="block mb-2 text-sm font-medium text-gray-900">Tracking Number <span class="text-red-600">*</span> </label>
                            <input id="tracking_no" type="text" placeholder="YYYY-XXXX-XXX" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="document_title" class="block mb-2 text-sm font-medium text-gray-900">Document Title <span class="text-red-600">*</span> </label>
                            <input id="document_title" type="text" placeholder="Document Title" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900">Document Type <span class="text-red-600">*</span> </label>
                            <select class="select select-bordered" id="document_type">
                                <option disabled selected>Pick one</option>
                                <option value="MOA">Memorandum of Agreement (MOA)</option>
                                <option value="Contract">Contract</option>
                                <option value="Legal Request">Legal Request</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="from" class="block mb-2 text-sm font-medium text-gray-900">From (Name / Office) <span class="text-red-600">*</span> </label>
                            <input id="from" type="text" placeholder="Name / Office" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="to" class="block mb-2 text-sm font-medium text-gray-900">To (Name / Office) <span class="text-red-600">*</span> </label>
                            <input id="to" type="text" placeholder="Assigned Hearing Officer" class="input input-bordered w-full input-md" />
                        </div>
                    </div>
                    <!-- Form Left -->
                    <!-- Form Right -->
                    <div class="flex flex-col w-full gap-2">
                        <div class="flex gap-3">
                            <div class="flex flex-col w-full">
                                <label for="date_received" class="block mb-2 text-sm font-medium text-gray-900">Date Received <span class="text-red-600">*</span></label>
                                <input id="date_received" type="date" placeholder="Date Received" class="input input-bordered w-full input-md" />
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="date_released" class="block mb-2 text-sm font-medium text-gray-900">Date Released</label>
                                <input id="date_released" type="date" placeholder="Date Released" class="input input-bordered w-full input-md" />
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                            <div class="flex w-full justify-between">
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add To-Do" name="radio-2" aria-label="To-Do" value="To-Do" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add Doing" name="radio-2" aria-label="Doing" value="Doing" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add Done" name="radio-2" aria-label="Done" value="Done" class="btn btn-sm w-36" />
                                </div>                                   
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900">Remarks</label>
                            <textarea id="remarks" class="textarea textarea-bordered" rows="5" placeholder="Enter Remarks..."></textarea>    
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
                                <button type="submit" class="btn btn-primary" onclick="add_document_confirm.close()" > YES</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </dialog>
    <!-- Add Document Record Modal-->

    <!-- Update Document Record Modal-->
    <dialog id="update_document_modal" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <!-- Form -->
            <form method="dialog">
                <h3 class="font-bold text-xl">Update Document Record</h3>
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
                            <input id="tracking_no" type="text" placeholder="YYYY-XXXX-XXX" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="document_title" class="block mb-2 text-sm font-medium text-gray-900">Document Title <span class="text-red-600">*</span> </label>
                            <input id="document_title" type="text" placeholder="Document Title" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900">Document Type <span class="text-red-600">*</span> </label>
                            <select class="select select-bordered" id="document_type">
                                <option disabled selected>Pick one</option>
                                <option value="MOA">Memorandum of Agreement (MOA)</option>
                                <option value="Contract">Contract</option>
                                <option value="Legal Request">Legal Request</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="from" class="block mb-2 text-sm font-medium text-gray-900">From (Name / Office) <span class="text-red-600">*</span> </label>
                            <input id="from" type="text" placeholder="Name / Office" class="input input-bordered w-full input-md" />
                        </div>
                        <div class="flex flex-col">
                            <label for="to" class="block mb-2 text-sm font-medium text-gray-900">To (Name / Office) <span class="text-red-600">*</span> </label>
                            <input id="to" type="text" placeholder="Assigned Hearing Officer" class="input input-bordered w-full input-md" />
                        </div>
                    </div>
                    <!-- Form Left -->
                    <!-- Form Right -->
                    <div class="flex flex-col w-full gap-2">
                        <div class="flex gap-3">
                            <div class="flex flex-col w-full">
                                <label for="date_received" class="block mb-2 text-sm font-medium text-gray-900">Date Received <span class="text-red-600">*</span></label>
                                <input id="date_received" type="date" placeholder="Date Received" class="input input-bordered w-full input-md" />
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="date_released" class="block mb-2 text-sm font-medium text-gray-900">Date Released</label>
                                <input id="date_released" type="date" placeholder="Date Released" class="input input-bordered w-full input-md" />
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                            <div class="flex w-full justify-between">
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add To-Do" name="radio-2" aria-label="To-Do" value="To-Do" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add Doing" name="radio-2" aria-label="Doing" value="Doing" class="btn btn-sm w-36" />
                                </div>
                                <div class="flex font-semibold">
                                    <input id="status" type="radio" id="Add Done" name="radio-2" aria-label="Done" value="Done" class="btn btn-sm w-36" />
                                </div>                                   
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900">Remarks</label>
                            <textarea id="remarks" class="textarea textarea-bordered" rows="5" placeholder="Enter Remarks..."></textarea>    
                        </div>
                    </div>
                    <!-- Form Right -->
                </div>
                <!-- Form Fields --> 
            </form>
            <!-- Form -->
            <div class="flex justify-end mt-auto ">
                <button class="btn btn-success text-white" onclick="add_document_confirm.showModal()">Update</button>
                <dialog id="add_document_confirm" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-xl">Confirm Action</h3>
                        <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>UPDATE</strong> a new document record?</strong>.</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn btn-outline">Cancel</button>
                                <button type="submit" class="btn btn-primary" onclick="update_document_confirm.close()" > YES</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </dialog>
    <!-- Update Document Record Modal-->


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


    <!-- Table -->
    <div class="card w-full bg-base-100 shadow-xl flex-1">
        <div class="card-body h-1 flex flex-col p-5">
            <div class="mb-2 w-full gap-2 flex flex-col items-center">
                <!-- Search and Filter-->
                <div class="w-full">
                    <label class="input input-bordered flex items-center gap-2 w-full">
                        <input wire:model.live.debounce.300ms = 'search' type="text" class="grow" placeholder="Search"/>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                    </label>
                </div>
                <div class="flex w-full gap-2 items-center justify-between">
                    <div class="flex gap-2 h-fit items-center justify-end">
                        <label for="filter_status" class="block text-sm font-medium text-gray-900 w-fit pl-2">Filter by:</label>
                        <select wire:model.live="filter_status" id="filter_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-40 p-2.5 ">
                            <option value='' select>All</option>
                            <option value="Status">Status</option>
                            <option value="Document Type">Document Type</option>
                        </select>
                    </div>
                    <button class="btn bg-indigo-800 btn-primary text-white items-center" onclick="add_document_modal.showModal()">  
                        <img src="storage/img/add icon.png" alt="Add Button">
                    </button>  
                </div> 
                <!-- Search and Filter-->
            </div>

            <!-- Card Options -->
            <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                <div class="flex flex-col h-1 gap-2">
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Card -->
                    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
                        <div class="card-body h-fit flex p-3">
                            <div class="flex flex-col">
                                <div class="text-sm font-bold opacity-60">Tracking Number</div>
                                <div class="font-bold">Document Title</div>
                                <div class="text-sm font-semibold opacity-60">Document Type</div>
                            </div>
                            <div class="flex items-center justify-end gap-2">
                                <div class="tooltip" data-tip="View Document Record">
                                    <button class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                                        View
                                    </button>
                                </div>
                                <div class="tooltip" data-tip="Update">
                                    <button type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Options -->


        </div>         
    </div>
    <!-- Table -->

</div>