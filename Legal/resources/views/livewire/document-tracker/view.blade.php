<dialog id="view_document" class="modal" wire:ignore.self>
    <div class="modal-box w-11/12 max-w-full scroll-container">
        <div class="h-full relative">
            <img src="storage/img/background.png" alt="view bg" class="absolute h-full w-full rounded-xl">
            <form method="dialog">
                <button wire:click = "close" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
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
                                <div class="h-6 mb-1"><i>Progress Status:</i></div>
                                <div class="h-6 mb-1"><i>Document Status:</i></div>
                                <div class="h-6 mb-1"><i>Remarks:</i></div>
                            </div>
                            <div class="font-bold w-3/4">
                                <div class="h-6 mb-2">{{$this->tracking_no}}</div>
                                <div class="h-6 mb-1">{{$this->document_title}}</div>
                                <div class="h-6 mb-1">{{$this->document_type}}</div>
                                <div class="h-6 mb-1">{{$this->from_office}}</div>
                                <div class="h-6 mb-1">{{$this->to_office}}</div>
                                <div class="h-6 mb-1">{{$this->date_received}}</div>
                                <div class="h-6 mb-1">{{$this->date_released}}</div>
                                <div class="h-6 mb-1 flex items-center"> 
                                    @if($this->progress_status=="In-Progress")
                                    <div class="badge badge-warning">
                                        {{ $this->progress_status}}
                                </div>
                                @elseif($progress_status=="Done")
                                <div class="badge badge-success">
                                    {{ $this->progress_status}}
                                </div>
                                @else
                                <div class="badge badge-info">
                                    {{ $this->progress_status}}
                                </div>
                                @endif
                                </div>
                                <div class="h-6 mb-1">
                                    @if($this->document_status!=null)
                                    <div class="badge badge-neutral">{{$this->document_status}}</div>
                                    @endif
                                </div>
                                <div class="h-auto mb-1 scroll-container overflow-auto">{{$this->remarks}}</div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
        <div class="divider"></div> 
        <div>
            <h3 class="font-bold text-2xl text-center mb-4">Document History</h3>
            <!-- Document Record History Table -->
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
                                    <th>Progress Status</th>
                                    <th>Document Status</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($document_record_history as $drc)
                                    <tr class="hover">
                                        <td>{{$drc->action}}</td>
                                        <td>{{$drc->version}}</td>
                                        <td>{{$drc->dt_updated}}</td>
                                        <td>{{$drc->tracking_no}}</td>
                                        <td>{{$drc->document_title}}</td>
                                        <td>{{$drc->document_type}}</td>
                                        <td>{{$drc->from_office}}</td>
                                        <td>{{$drc->to_office}}</td>
                                        <td>{{$drc->date_received}}</td>
                                        <td>{{$drc->date_released}}</td>
                                        <td>{{$drc->progress_status}}</td>
                                        <td>{{$drc->document_status}}</td>
                                        <td>{{$drc->remarks}}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>         
            </div>
            <!-- Document Record History Table -->
        </div>
        
    </div>
</dialog>