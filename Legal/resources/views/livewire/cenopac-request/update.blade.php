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
                        <label for="employee_name" class="block mb-2 text-sm font-medium text-gray-900">Employee Name <span class="italic">(FN, MN, LN)</span> <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='employee_name' id="employee_name" type="text" placeholder="e.g Juan Ponce Dela Cruz" class="input input-bordered w-full input-md" />
                        @error('employee_name')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Office / College <span class="text-red-600">*</span> </label>
                        <select wire:model = 'originating_office' class="select select-bordered w-full">
                            <option disabled value="" selected>Pick one</option>
                            <option disabled class="bg-gray-300 text-black font-semibold">Colleges</option>
                                <option value="College of Accountancy">College of Accountancy</option>
                                <option value="College of Architecture and Sustainable Built Environments">College of Architecture and Sustainable Built Environments</option>
                                <option value="College of Business Administration">College of Business Administration</option>
                                <option value="College of Education">College of Education</option>
                                <option value="College of Engineering">College of Engineering</option>
                                <option value="College of Humanities, Arts & Social Science">College of Humanities, Arts & Social Science</option>
                                <option value="College of Information Systems & Technology Management">College of Information Systems & Technology Management</option>
                                <option value="College of Law">College of Law</option>
                                <option value="College of Medicine">College of Medicine</option>
                                <option value="College of Nursing">College of Nursing</option>
                                <option value="College of Physical Therapy">College of Physical Therapy</option>
                                <option value="College of Public Administration">College of Public Administration</option>
                                <option value="College of Science">College of Science</option>
                                <option value="College of Tourism & Hospitality Management">College of Tourism & Hospitality Management</option>
                                <option value="Graduate School of Law">Graduate School of Law</option>
                            <option disabled class="bg-gray-300 text-black font-semibold">Offices</option>
                                <option value="Admission Office">Admission Office</option>
                                <option value="General Services Office">General Services Office</option>
                                <option value="Human Resource Management Office">Human Resource Management Office</option>
                                <option value="Information & Communications Technology Office">Information & Communications Technology Office</option>
                                <option value="Internal Audit Office">Internal Audit Office</option>
                                <option value="Office of Guidance & Testing Services">Office of Guidance & Testing Services</option>
                                <option value="Office of National Service Training Program">Office of National Service Training Program</option>
                                <option value="Office of Student Development & Services">Office of Student Development & Services</option>
                                <option value="Office of the University Legal Counsel">Office of the University Legal Counsel</option>
                                <option value="Physical Facilities Management Office">Physical Facilities Management Office</option>
                                <option value="Property & Supplies Office">Property & Supplies Office</option>
                                <option value="University Center for Research and Extension Services">University Center for Research and Extension Services</option>
                                <option value="University Health Service">University Health Service</option>
                                <option value="University Library">University Library</option>
                                <option value="University Registrar">University Registrar</option>
                                <option value="University Research Center">University Research Center</option>
                                <option value="University Security Office">University Security Office</option>
                        </select>
                        <!--<input wire:model.defer='originating_office' id="case_title" type="text" placeholder="Office / College" class="input input-bordered w-full input-md" />-->
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
                            <input id="date_requested" type="date" value="{{$this->date_requested}}" placeholder="Date Issued" class="input input-bordered w-full input-md disabled:text-black" disabled/>
                        </div>
                    </div>
                    
                    @if($this->status != 'Denied')
                        <div class="flex flex-row justify-between mt-1 items-center">
                            <label for="status" class="block text-sm font-medium text-gray-900">Priority <span class="text-red-600">*</span></label>
                            <div class="flex font-semibold">
                                <input wire:model = 'priority' name = "priority" id="priority" type="radio" id="Add Urgent" name="radio-2" aria-label="Urgent" value="Urgent" class="btn btn-sm btn-wide" />
                            </div>
                            <div class="flex font-semibold">
                                <input wire:model = 'priority' name = "priority" id="priority" type="radio" id="Add Nonurgent" name="radio-2" aria-label="Non-Urgent" value="Non-Urgent" class="btn btn-sm btn-wide" />
                            </div>
                            @error('priority')
                                <span class="text-red-500"> {{$message}}</span>
                            @enderror                                    
                        </div>
                    @endif
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