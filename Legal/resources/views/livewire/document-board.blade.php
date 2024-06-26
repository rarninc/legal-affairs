<div class="h-full flex flex-col">
    <div class="card w-full h-full bg-base-100 shadow-xl">
        <div class="card-body h-full flex p-5">

            <div class="flex h-full w-full gap-5">
                <!-- TO-DO -->
                <div class="h-full flex flex-col w-1/2 gap-1">
                    <div class="divider w-full text-3xl font-semibold text-info"><i>To-Do</i></div>
                    <div class="h-full w-full flex flex-col relative">
                        <div class="card w-full h-full bg-info opacity-20 shadow-inner absolute"></div>
                        
                        <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                            <div class="flex flex-col h-1 gap-3 p-5">
                                <!-- Document "To-Do" Card -->
                                @foreach ($dr_to_do as $todos)
                                <div class="card h-fit bg-info shadow-xl relative">
                                    <div class="card-body h-fit flex p-3">
                                        <div class="flex flex-col">
                                            <div class="font-bold opacity-60">{{$todos->tracking_no}}</div>
                                            <div class="text-xl font-bold">{{$todos->document_title}}</div>
                                            <div class="font-semibold opacity-60">{{$todos->document_type}}</div>
                                        </div>           
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TO-DO -->

                <!-- DOING -->
                <div class="h-full flex flex-col w-1/2 gap-1">
                    <div class="divider w-full text-3xl font-semibold text-warning"><i>Doing</i></div>
                    <div class="h-full w-full flex flex-col relative">
                        <div class="card w-full h-full bg-warning opacity-20 shadow-inner absolute"></div>
                        
                        <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                            <div class="flex flex-col h-1 gap-3 p-5">
                                <!-- Document "Doing" Card -->
                                @foreach ($dr_doing as $doing)
                                <div class="card h-fit bg-warning shadow-xl relative">
                                    <div class="card-body h-fit flex p-3">
                                        <div class="flex flex-col">
                                            <div class="font-bold opacity-60">{{$doing->tracking_no}}</div>
                                            <div class="text-xl font-bold">{{$doing->document_title}}</div>
                                            <div class="flex flex-row justify-between">
                                                <div class="font-semibold opacity-60">{{$doing->document_type}}</div>
                                                @if($doing->document_status != null)
                                                    <div class="badge badge-neutral">{{$doing->document_status}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DOING -->
            </div>
        </div>         
    </div>
</div>
