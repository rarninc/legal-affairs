<dialog id="view_case" class="modal" wire:ignore.self>
    <div class="modal-box w-11/12 max-w-full scroll-container">
        <div class="h-full relative">
            <img src="storage/img/plm facade.png" alt="view bg" class="absolute h-full w-full rounded-xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div class="flex justify-center pt-4">
                <div class="card w-3/5 bg-indigo-800 shadow-xl">
                    <div class="card-body h-full flex flex-col p-4">
                        <h3 class="font-bold text-2xl text-white text-center">Case Record</h3>
                    </div>
                </div>
            </div>
            <div class="flex justify-center pb-4">
                <div class="card w-3/5 mt-4 bg-base-200 shadow-xl">
                    <div class="card-body h-full flex flex-col p-5">
                        <div class="flex px-5 gap-4 justify-center">
                            <div class="flex flex-col w-1/4">
                                <div class="h-6 mb-2"><i>Case Docket Number:</i></div>
                                <div class="h-6 mb-1"><i>Name:</i></div>
                                <div class="h-6 mb-1"><i>Case Title:</i></div>
                                <div class="h-6 mb-1"><i>Charge:</i></div>
                                <div class="h-6 mb-1"><i>Offense:</i></div>
                                <div class="h-6 mb-1"><i>Assigned Officer:</i></div>
                                <div class="h-6 mb-1"><i>Date Issued:</i></div>
                                <div class="h-6 mb-1"><i>Date Resolved:</i></div>
                                <div class="h-6 mb-1"><i>Status:</i></div>
                                <div class="h-6 mb-1"><i>Remarks:</i></div>
                            </div>
                            <div class="font-bold w-3/4">
                                <div class="h-6 mb-2">{{$case_docket}}</div>
                                <div class="h-6 mb-1">{{$employee_name}}</div>
                                <div class="h-6 mb-1">{{$case_title}}</div>
                                <div class="h-6 mb-1">{{$charge}}</div>
                                <div class="h-6 mb-1">{{$offense}}</div>
                                <div class="h-6 mb-1">{{$assigned_officer}}</div>
                                <div class="h-6 mb-1">{{$date_issued}}</div>
                                <div class="h-6 mb-1">{{$date_resolved}}</div>
                                <div class="h-6 mb-1 flex items-center">
                                    @if($status=="On-going")
                                    <div class="badge badge-warning">
                                        {{ $status}}
                                    </div>
                                    @elseif($status=="Resolved")
                                    <div class="badge badge-success">
                                        {{ $status}}
                                    </div>
                                    @endif
                                </div>
                                <div class="h-auto mb-1 scroll-container overflow-auto">{{$remarks}}</div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
        <div class="divider"></div> 
        <div>
            <h3 class="font-bold text-2xl text-center mb-4">Case History</h3>
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
                                    <th>Case Docket Number</th>
                                    <th>Name</th>
                                    <th>Case Title</th>
                                    <th>Charge</th>
                                    <th>Offense</th>
                                    <th>Status</th>
                                    <th>Date Issued</th>
                                    <th>Date Resolved</th>
                                    <th>Remarks</th>
                                    <th>Assigned Officer</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($case_matrix_history as $cmh)
                                <tr class="hover">
                                    <td>{{$cmh->action}}</td>
                                    <td>{{$cmh->version}}</td>
                                    <td>{{$cmh->dt_updated}}</td>
                                    <th>{{$cmh->case_docket}}</th>
                                    <td>{{$cmh->employee_name}}</td>
                                    <td>{{$cmh->case_title}}</td>
                                    <td>{{$cmh->charge}}</td>
                                    <td>{{$cmh->offense}}</td>
                                    <td>{{$cmh->status}}</td>
                                    <td>{{$cmh->date_issued}}</td>
                                    <td>{{$cmh->date_resolved}}</td>
                                    <td>{{$cmh->remarks}}</td>
                                    <td>{{$cmh->assigned_officer}}</td>
                                </tr> 
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>         
            </div>
            <!-- Case History Table -->
        </div>
        
    </div>
</dialog>