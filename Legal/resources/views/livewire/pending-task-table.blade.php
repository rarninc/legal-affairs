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
                            @foreach($tasks as $t)
                            <tr>
                                <th>{{$t["no"]}}</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">{{$t["task_title"]}}</div>
                                            <div class="text-sm opacity-50">{{$t["task_type"]}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="range" min="0" max="100" value="20" class="range range-xs w-full" step="20" />
                                    <div class="w-full flex justify-between text-xs px-2">
                                        <span>0</span>
                                        <span>20</span>
                                        <span>40</span>
                                        <span>60</span>
                                        <span>80</span>
                                        <span>100</span>
                                    </div>
                                </td>
                                <th><div class="badge badge-warning">{{$t["remarks"]}}</div></th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>