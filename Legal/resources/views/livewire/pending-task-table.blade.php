<div class="card h-full w-full bg-base-100 shadow-xl">
                <div class="card-body flex h-1 p-5">
                    <div class="divider divider-start text-2xl font-semibold text-indigo-900"><i>Pending Tasks</i></div>
                    <div class="scroll-container overflow-x-auto">
                        <table class="table table-pin-rows">
                            <!-- head -->
                            <thead>
                                <tr class="bg-neutral-300 text-black">
                                    <th>#</th>
                                    <th>Task Name</th>
                                    <th class="w-96">Progress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pending_tasks as $t)
                            <tr>
                                <th>{{$ctr += 1}}</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">{{$t->record_title}}</div>
                                            <div class="text-sm opacity-50">{{$t->table_name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input disabled type="range" min="0" max="100" value="{{$t->progress_no}}" class="range range-xs w-full" step="20" />
                                </td>
                                <th> 
                                    @if($t->priority=="Urgent")
                                    <div class="badge badge-error">{{$t->priority}}</div>
                                    @else
                                    <div class="badge badge-warning">{{$t->priority}}</div>
                                    @endif
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>