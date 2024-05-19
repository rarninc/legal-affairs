<div class = "h-full flex flex-col">
    <!-- Title -->
    <div class="card h-24 w-full bg-base-100 shadow-xl">
        <div class="card-body flex-row h-24 p-5 items-center">
        <div class="flex flex-col flex-1">
            <h2 class="card-title text-3xl">CeNoPAC Request</h2>

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
                    CeNoPAC Request
                </span>
                </li>
            </ul>
            </div>

        </div>
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

    <!-- Update Request Modal -->
    @include('livewire.cenopac-request.update')
    <!-- Update Request Modal -->
    <!-- Delete Request Modal-->
    @include('livewire.cenopac-request.delete')
    <!-- Delete Request Modal-->    
    <!-- Table -->
    <div class="card h-full w-full mt-4 bg-base-100 shadow-xl">
        <div class="card-body flex flex-col h-1 p-5">
            <div class="mb-2 w-full gap-4 flex items-center">   
                @include('livewire.cenopac-request.search_filter')
                <!-- Add Request Modal -->
                @include('livewire.cenopac-request.add')
                <!-- Add Request Modal-->  
            </div>
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
                            'displayName'=> 'Date Requsted'
                        ])
                        <th>Status</th>
                        <th class="w-20"></th>
                        <th class="w-20"></th>
                        <th class="w-20"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cenopac_request as $cr)
                    <tr wire:key="{{$cr->id}}"class="hover">                    
                        <td>{{$cr->employee_name}}</td>
                        <td>{{$cr->originating_office}}</td>
                        <td>{{$cr->position}}</td>
                        <td>{{$cr->purpose}}</td>
                        <td>{{$cr->date_requested}}</td>
                        @if($cr->status=="Pending")
                            <td>
                                <div class="badge badge-warning">
                                    {{ $cr->status}}
                                </div>
                            </td>
                        @elseif($cr->status=="For Release")
                            <td>
                                <div class="badge badge-success">
                                    {{ $cr->status}}
                                </div>
                            </td>
                        @elseif($cr->status=="Denied")
                            <td>
                                <div class="badge badge-error">
                                    {{ $cr->status}}
                                </div>
                            </td>
                        @endif
                        <td>
                            <div class="tooltip" data-tip="Update Request">
                                <button type = "button" class="btn btn-sm btn-success" 
                                    wire:click = "edit_cenopac_request({{ $cr->id }})" 
                                    onclick="delayedModalShow()">
                                    <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="tooltip" data-tip="Delete Request">
                                <button wire:click = "fetchID('{{$cr->id}}')" 
                                        wire:loading.attr = "disabled"
                                        type = "button" class="btn btn-sm btn-error" onclick="delete_request_confirm.showModal()">
                                    <img src="storage/img/delete icon.png" alt="Delete Button" class="h-4">
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class="tooltip" data-tip="Generate">
                                <a href = "{{route('cenopac', [
                                        'id' => $cr->id,
                                        'employee_name' => $cr->employee_name, 
                                        'originating_office' =>$cr->originating_office, 
                                        'position' =>$cr->position, 
                                        'purpose' =>$cr->purpose, 
                                        'date_requested' =>$cr->date_requested
                                ])}}">
                                    <button type = "button" class="btn btn-sm btn-neutral">
                                        <img src="storage/img/check requests icon.png" alt="Delete Button" class="h-4">
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>           
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-2 flex w-full gap-4">
                <div class="flex gap-2 h-fit items-center">
                    <label for="records per page" class="block text-sm font-medium text-gray-900 w-full">Per Page</label>
                    <select wire:model.live='perPage' id="records per page" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-20 p-2.5 ">
                        <option value="7">7</option>
                        <option value="12">12</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <div class="w-full">
                    {{ $cenopac_request->links() }} 
                </div>   
            <!-- Pagination -->
            </div> 
        </div>
    </div>

    <script>
        function delayedModalShow() {
            setTimeout(function() {
                document.getElementById('update_cenopac_req_modal').showModal();
            }, 300); 
        }
    </script>
    <!-- Table -->
</div>