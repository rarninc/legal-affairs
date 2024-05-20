<div class = "h-full flex flex-col">

    <!-- Title -->
    <div class="card h-24 w-full bg-base-100 shadow-xl">
        <div class="card-body flex-row h-24 p-5 items-center">
        <div class="flex flex-col flex-1">
            <h2 class="card-title text-3xl"><i class = "font-bold">CeNoPAC</i> : Certificate of No Pending Administrative Case</h2>

            <div class="text-sm breadcrumbs pb-0">
            <ul>
                <li>
                <span class="inline-flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    University Clearance
                </span>
                </li> 
            </ul>
            </div>

        </div>
        <!-- View Records -->
        <a href="cenopac_record">
            <button class="btn bg-indigo-800 btn-primary text-white items-center">
                <img src="storage/img/folder icon.png" alt="Records Button">
                View Records
            </button>
        </a>
        <!-- View Records -->
        <!-- Check Requests -->
        <a href="cenopac_request">
            <button class="btn bg-indigo-800 btn-primary text-white items-center">
                <img src="storage/img/check requests icon.png" alt="Request Button">
                Check Requests
            </button>
        </a>
        <!-- Check Requests -->
        </div>
    </div>
    <!-- Title -->
    <div class="flex h-full mt-4 gap-4">
        <!-- Form -->
        <div class="card h-full w-3/5 bg-base-100 shadow-xl">
            <div class="card-body flex h-1 p-5">
                <!-- Form -->
                <form method="">
                    <h3 class="font-bold text-xl">Certificate Generation</h3>
                    <div class="flex py-2">
                        <p>Provide data to the following fields. Click GENERATE to create certificate.</p>
                        <button type="reset" class="bg-gray-300 rounded px-4 h-fit ml-auto text-gray-800 font-semibold hover:bg-gray-400">Reset Fields</button>
                    </div>
                    <!-- Form Fields -->    
                    <div class="flex gap-4 my-4 px-20">
                        <div class="flex flex-col w-full gap-2">
                            <div class="flex flex-col">
                                <label for="employee_name" class="block mb-2 text-sm font-medium text-gray-900">Name <span class="text-red-600">*</span> </label>
                                <input wire:model.live='employee_name' id="employee_name" type="text" placeholder="Name" class="input input-bordered w-full input-md" />
                                @error('employee_name')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="originating_office" class="block mb-2 text-sm font-medium text-gray-900">Office / College <span class="text-red-600">*</span> </label>
                                <select class="select select-bordered w-full">
                                    <option disabled selected>Pick one</option>
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
                                <!--<input wire:model.live='originating_office' id="originating_office" type="text" placeholder="Office / College" class="input input-bordered w-full input-md" />-->
                                @error('originating_office')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="position" class="block mb-2 text-sm font-medium text-gray-900">Position <span class="text-red-600">*</span> </label>
                                <input wire:model.live='position' id="position" type="text" placeholder="Position" class="input input-bordered w-full input-md" />
                                @error('position')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose <span class="text-red-600">*</span> </label>
                                <input wire:model.live='purpose' id="purpose" type="text" placeholder="Purpose" class="input input-bordered w-full input-md" />
                                @error('purpose')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex gap-3">
                                <div class="flex flex-col w-full">
                                    <label for="date_requested" class="block mb-2 text-sm font-medium text-gray-900">Date Requested <span class="text-red-600">*</span></label>
                                    <input wire:model.live='date_requested' id="date_requested" type="date" placeholder="Date Issued" class="input input-bordered w-full input-md" />
                                    @error('date_requested')
                                    <span class="text-red-500"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full">
                                    <label for="date_issued" class="block mb-2 text-sm font-medium text-gray-900">Date Issued <span class="text-red-600">*</span></label>
                                    <input wire:model.live='date_issued' id="date_issued" type="date" placeholder="Date Resolved" class="input input-bordered w-full input-md" />
                                    @error('date_issued')
                                    <span class="text-red-500"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Fields -->
                </form>
                <!-- Form -->
                <div class="flex justify-center mt-10">
                    <button class="btn btn-wide bg-indigo-800 btn-primary text-white" onclick="no_pending_case.showModal()">GENERATE</button>                    
                    <dialog id="no_pending_case" class="modal" wire:ignore.self>
                    <div class="modal-box w-11/12 max-w-fit flex flex-col">
                        <h3 class="font-bold text-xl mb-4">Please confirm the following details:</h3>
                        <div class="flex px-5 gap-6 justify-center">
                            <div class="flex flex-col w-fit">
                                <div class="h-6 mb-1"><i>Name:</i></div>
                                <div class="h-6 mb-1"><i>Office / College:</i></div>
                                <div class="h-6 mb-1"><i>Position:</i></div>
                                <div class="h-6 mb-1"><i>Purpose:</i></div>
                                <div class="h-6 mb-1"><i>Date Requested:</i></div>
                                <div class="h-6 mb-1"><i>Date Issued:</i></div>
                            </div>
                            <div class="font-bold w-fit">
                                <div class="h-6 mb-1">{{$employee_name}}</div>
                                <div class="h-6 mb-1">{{$originating_office}}</div>
                                <div class="h-6 mb-1">{{$position}}</div>
                                <div class="h-6 mb-1">{{$purpose}}</div>
                                <div class="h-6 mb-1">{{$date_requested}}</div>
                                <div class="h-6 mb-1">{{$date_issued}}</div>
                            </div>
                        </div>

                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn btn-outline">Cancel</button>
                                <button wire:click.prevent="create" 
                                        wire:loading.attr = "disabled"
                                        type="submit" class="btn btn-success text-white" onclick="no_pending_case.close()" > Generate Certificate</button>
                            </form>
                        </div>
                    </div>
                    </dialog>
                </div>
            </div>
        </div>
        <!-- Form -->
        {{$reject}}
        <!-- Toast -->
        @if(session('success'))
            <div class="toast toast-top toast-center"on>
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{session('success')}}.</span>
                </div>
            </div>
        @elseif(session('failed'))
            <div class="toast toast-top toast-center"on>
                <div class="alert alert-error gap-9">
                    <div class="flex gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{session('failed')}}.</span>
                    </div>
                    <div class="gap-2">
                        <a href="{{route('case_matrix', ['employee_name' => $employee_name])}}"><button type = "button" class="btn btn-sm">Check Case Matrix</button></a>
                    </div>
                </div>
            </div>
        @endif
        <!-- Toast -->
        <!--PDF Viewer-->
        <div class="h-full w-2/5">
            <object data="storage/pdf/TEMPLATE.pdf" type="application/pdf" class="flex justify-center items-center h-full w-full">
                <p class="py-2 px-4 bg-gold rounded-md">Unable to display PDF file. <a href=""><strong><u>Download</u></strong></a> instead.</p>
            </object>
        </div>
        <!--PDF Viewer-->
    </div>
    
</div>
