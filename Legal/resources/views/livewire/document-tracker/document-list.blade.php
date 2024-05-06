@foreach($document_record as $dr)
    <div class="card h-fit bg-gray-300 text-black shadow-sm relative">
        <div class="card-body h-fit flex p-3">
            <div class="flex flex-col">
                <div class="text-sm font-bold opacity-60">{{$dr->tracking_no}}</div>
                <div class="font-bold">{{$dr->document_title}}</div>
                <div class="text-sm font-semibold opacity-60">{{$dr->document_type}}</div>
            </div>
            <div class="flex items-center justify-end gap-2">
                <div class="tooltip" data-tip="View Document Record">
                    <button wire:click = "edit_document_record('{{$dr->id}}')" class="btn btn-sm btn-outline btn-neutral" onclick="view_document.showModal()">
                        View
                    </button>
                </div>
                <div class="tooltip" data-tip="Update">
                    <button wire:click = "edit_document_record('{{$dr->id}}')" type = "button" class="btn btn-sm btn-neutral" onclick="update_document_modal.showModal()">
                        <img src="storage/img/update icon.png" alt="Update Button" class="h-4">
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach