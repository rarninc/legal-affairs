<div class = "h-full flex flex-col">
    <!-- Title -->
    <div class="card h-24 w-full bg-base-100 shadow-xl">
        <div class="card-body flex-row h-24 p-5 items-center">
        <div class="flex flex-col flex-1">
            <h2 class="card-title text-3xl">CeNoPAC Records</h2>

            <div class="text-sm breadcrumbs pb-0">
            <ul>
                <li>
                <a href="cenopac" class="inline-flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    University Clearance
                </a>
                </li> 
                <li>
                <span class="inline-flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    CeNoPAC Records
                </span>
                </li>
            </ul>
            </div>

        </div>
        <!-- Search-->
        <div>
            <label class="input input-bordered flex items-center gap-2 w-fit">
                <input wire:model.live.debounce.300ms = 'search' type="text" class="grow" placeholder="Search"/>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
            </label>
        </div>                
        <!-- Search-->
        <!-- Return -->
        <a href="cenopac"> 
            <button class="btn bg-indigo-800 btn-primary text-white items-center">
                <img src="storage/img/return icon.png" alt="Return Button">
                Return
            </button>
        </a>
        <!-- Return -->
        </div>
    </div>
    <!-- Title -->
    <!-- Table -->
    <div class="card h-full w-full mt-4 bg-base-100 shadow-xl">
        <div class="card-body flex flex-col h-1 p-5">            
            <div class="scroll-container flex-1 overflow-x-auto w-full rounded-lg">
                <table class="table table-zebra table-pin-rows">
                <!-- head -->
                <thead>
                    <tr class="bg-neutral-300 text-black text-sm">        
                    @include('livewire.table-sort',[
                        'colname'=> 'employee_name',
                        'displayName'=> 'Name'
                    ])
                    @include('livewire.table-sort',[
                        'colname'=> 'originating_office',
                        'displayName'=> 'Office'
                    ])
                    @include('livewire.table-sort',[
                        'colname'=> 'position',
                        'displayName'=> 'Position'
                    ])
                    @include('livewire.table-sort',[
                        'colname'=> 'purpose',
                        'displayName'=> 'Purpose'
                    ])      
                    @include('livewire.table-sort',[
                        'colname'=> 'date_requested',
                        'displayName'=> 'Date Requested'
                    ])
                    @include('livewire.table-sort',[
                        'colname'=> 'date_issued',
                        'displayName'=> 'Date Issued'
                    ])                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($cenopac_record as $cr)
                    <tr class="hover">                    
                    <td>{{$cr->employee_name}}</td>
                    <td>{{$cr->originating_office}}</td>
                    <td>{{$cr->position}}</td>
                    <td>{{$cr->purpose}}</td>
                    <td>{{$cr->date_requested}}</td>
                    <td>{{$cr->date_issued}}</td>
                    </tr>
                    @endforeach                    
                </tbody>
                </table>
            </div>
            <div class="mt-2 flex w-full gap-4">
                <div class="flex gap-2 h-fit items-center">
                    <label for="records per page" class="block text-sm font-medium text-gray-900 w-full">Per Page</label>
                    <select wire:model.live='perPage' id="records per page" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-20 p-2.5 ">
                        <option value="10">10</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                        <option value="25">30</option>
                    </select>
                </div>
                <div class="w-full">
                    {{ $cenopac_record->links() }} 
                </div>   
            </div> 
        </div>
    </div>
    <!-- Table -->
</div>
