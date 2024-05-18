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
                        <th>Status</th>
                        <th class="w-96">Remarks</th>
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
                    <th><div class="badge badge-warning">{{$t["status"]}}</div></th>
                    <td><div>{{$t["remarks"]}}</div></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>