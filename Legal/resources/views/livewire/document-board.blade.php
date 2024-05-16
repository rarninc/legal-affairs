<div class="h-full flex flex-col">
    <div class="card w-full h-full bg-base-100 shadow-xl">
        <div class="card-body h-full flex p-5">

            <div class="flex h-full w-full gap-5">
                <!-- TO-DO -->
                <div class="h-full flex flex-col w-1/3 gap-1">
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
                                            <div class="text-sm font-bold opacity-60">{{$todos->tracking_no}}</div>
                                            <div class="font-bold">{{$todos->document_title}}</div>
                                            <div class="text-sm font-semibold opacity-60">{{$todos->document_type}}</div>
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
                <div class="h-full flex flex-col w-1/3 gap-1">
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
                                            <div class="text-sm font-bold opacity-60">{{$doing->tracking_no}}</div>
                                            <div class="font-bold">{{$doing->document_title}}</div>
                                            <div class="text-sm font-semibold opacity-60">{{$doing->document_type}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DOING -->

                <!-- DONE -->
                <div class="h-full flex flex-col w-1/3 gap-1">
                    <div class="divider w-full text-3xl font-semibold text-success"><i>Done</i></div>
                    <div class="h-full w-full flex flex-col relative">
                        <div class="card w-full h-full bg-success opacity-20 shadow-inner absolute"></div>
                        
                        <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                            <div class="flex flex-col h-1 gap-3 p-5">
                                <!-- Document "Done" Card -->
                                @foreach ($dr_done as $done)
                                <div class="card h-fit bg-success shadow-xl relative">
                                    <div class="card-body h-fit flex p-3">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-bold opacity-60">{{$done->tracking_no}}</div>
                                            <div class="font-bold">{{$done->document_title}}</div>
                                            <div class="text-sm font-semibold opacity-60">{{$done->document_type}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DONE -->
            </div>
        </div>         
    </div>
</div>
