<!-- You can open the modal using ID.showModal() method -->
<button class="btn bg-indigo-800 btn-primary text-white items-center" onclick="add_request_modal.showModal()">  
    <img src="storage/img/add icon.png" alt="Add Button">
    Add Request
</button>

<dialog id="add_request_modal" class="modal" wire:ignore.self>
    <div class="modal-box w-fit">
        <!-- Form -->
        <form method="dialog">
            <h3 class="font-bold text-xl">Add CeNoPAC Request</h3>
            <button wire:click = "close" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <div class="flex py-2">
                <p>Provide data to the following fields. Click ADD when you're done.</p>
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
                        <label for="originating_office" class="block mb-2 text-sm font-medium text-gray-900">Office / College <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='originating_office' id="originating_office" type="text" placeholder="Office / College" class="input input-bordered w-full input-md" />
                        @error('originating_office')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900">Position <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='position' id="position" type="text" placeholder="Position" class="input input-bordered w-full input-md" />
                        @error('position')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose <span class="text-red-600">*</span> </label>
                        <input wire:model.defer='purpose' id="purpose" type="text" placeholder="Purpose" class="input input-bordered w-full input-md" />
                        @error('purpose')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="date_requested" class="block mb-2 text-sm font-medium text-gray-900">Date Requested <span class="text-red-600">*</span></label>
                        <input wire:model.defer='date_requested' id="date_requested" type="date" placeholder="Date Issued" class="input input-bordered w-full input-md" />
                        @error('date_requested')
                        <span class="text-red-500"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Form Fields -->
        </form>
        <!-- Form -->
        <div class="flex justify-center mt-auto">
            <button class="btn btn-wide bg-indigo-800 btn-primary text-white" onclick="add_request_confirm.showModal()">Add</button>
            <dialog id="add_request_confirm" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-xl">Confirm Action</h3>
                <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>ADD</strong> a new CeNoPAC request?</strong>.</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-outline">Cancel</button>
                        <button wire:click.prevent="create" type="submit" class="btn btn-primary" onclick="add_request_confirm.close()" > YES</button>
                    </form>
                </div>
            </div>
            </dialog>
        </div>
    </div>
</dialog>
    
@if(session('success'))
<div class="toast toast-top toast-center">
    
    <div class="alert alert-success">
        <span>{{session('success')}}.</span>
    </div>
</div>
@endif