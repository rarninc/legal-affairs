<div class="card w-full mt-4 bg-base-100 shadow-xl flex-1">
    <div class="card-body h-1 flex flex-col p-5">
        <div class="mb-2 w-full gap-4 flex items-center">
            <!-- Search and Filter-->
            @include('livewire.case-matrix.search_filter')             
            <!-- Search and Filter-->
        </div>

        <div class="scroll-container flex-1 w-full overflow-auto rounded-lg">
            <table class="table table-zebra table-pin-rows">
                <!-- head -->
                <thead>
                    <tr class="bg-neutral-300 text-black text-sm">
                        @include('livewire.table-sort',[
                            'colname'=> 'case_docket',
                            'displayName'=> 'Case Docket Number'
                        ])
                        @include('livewire.table-sort',[
                            'colname'=> 'employee_name',
                            'displayName'=> 'Name'
                        ])
                        @include('livewire.table-sort',[
                            'colname'=> 'case_title',
                            'displayName'=> 'Case Title'
                        ])
                        <th> Status </th>                     
                        <th class="w-20"></th>
                        <th class="w-20"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($case_matrix as $cm)
                    <tr class="hover">
                        <td>{{ $cm->case_docket}}</th>
                        <td>{{ $cm->employee_name}}</td>
                        <td>{{ $cm->case_title}}</td>
                        @if($cm->status=="On-going")
                        <td>
                            <div class="badge badge-warning">
                                {{ $cm->status}}
                            </div>
                        </td>
                        @elseif($cm->status=="Resolved")
                        <td>
                            <div class="badge badge-success">
                                {{ $cm->status}}
                            </div>
                        </td>
                        @endif
                        {{-- View Button --}}                           
                        <td>
                            <div class="tooltip" data-tip="View Case Record">
                                <button class="btn btn-sm btn-outline btn-neutral" onclick="view_case.showModal()"
                                wire:click = "view_case_history('{{$cm->case_docket}}','{{$cm->employee_name}}','{{$cm->case_title}}','{{$cm->charge}}','{{$cm->offense}}','{{$cm->assigned_officer}}','{{$cm->date_issued}}', '{{$cm->date_resolved}}', '{{$cm->status}}', '{{$cm->remarks}}')">
                                    View
                                </button>
                            </div>
                        </td>                            
                        {{-- Update Button --}}                          
                        <td>
                            <div class="tooltip" data-tip="Update">
                                <button type = "button" class="btn btn-sm btn-success" wire:click = "edit_case_record('{{ $cm->case_docket }}')" onclick="update_case_modal.showModal()">
                                <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
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
                {{ $case_matrix->links() }} 
            </div>   
        </div>  
    </div>         
</div>