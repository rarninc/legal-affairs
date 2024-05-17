@extends('template')

@section('content')

    <div class="divider divider-start w-full"><i class="text-3xl font-semibold p-2">Dashboard</i></div>

    <div class="flex h-full gap-3 mt-2">

        <div class="flex flex-col gap-3 w-2/3">

            <div class="card h-1/5 w-full bg-indigo-900 justify-center items-center shadow-xl">
                <img src="storage/img/PLM LOGO.png" alt="" class="absolute h-full w-auto opacity-40 p-5">
                <div class="card-body flex flex-row w-full py-5 px-20 text-white relative justify-between items-center">
                    <div class ="flex flex-col">
                        <h3 class="text-5xl font-semibold relative">Hello, Carlo!</h3>
                        <p class="text-xl relative">What do you want to do today?</p>
                    </div>

                    <div class="card-actions flex flex-col gap-1 items-center justify-center relative">
                        <i id="datetime" class="btn glass text-2xl text-white font-bold"></i>
                        <button class="btn btn-sm btn-outline text-white text-lg w-full">Generate Reports</button>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="flex w-full gap-3 justify-items-stretch">
                <div class="stats shadow w-full bg-info">
                    <div class="stat w-full">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/briefcase.png" alt="" class="h-14">
                        </div>
                        <div class="stat-title font-semibold">Cases this Month</div>
                        <div class="stat-value">{{$case_resolved_count}}</div>
                        <div class="stat-desc font-semibold">{{$month_and_year}}</div>
                        <div class="stat-actions">
                            <a href="case_matrix"><button class="btn btn-sm btn-outline">Case Matrix</button> </a>
                        </div>
                    </div>
                </div>

                <div class="stats shadow w-full bg-success">
                    <div class="stat w-full">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/docs.png" alt="" class="h-14">
                        </div>
                        <div class="stat-title font-semibold">Proccessed Documents</div>
                        <div class="stat-value">{{$doc_done_count}}</div>
                        <div class="stat-desc font-semibold">{{$month_and_year}}</div>
                        <div class="stat-actions">
                            <button class="btn btn-sm btn-outline">More</button> 
                        </div>
                    </div>
                </div>

                <div class="stats shadow w-full bg-warning">
                    <div class="stat w-full">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/cert.png" alt="" class="h-14">
                        </div>
                        <div class="stat-title font-semibold">CeNoPAC Generated</div>
                        <div class="stat-value">{{$cenopac_generated_count}}</div>
                        <div class="stat-desc font-semibold">{{$month_and_year}}</div>
                        <div class="stat-actions">
                            <a href="cenopac_record"><button class="btn btn-sm btn-outline">Records</button></a>
                            <a href="cenopac"><button class="btn btn-sm">Generate</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats -->

            <!-- Pending Tasks -->
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
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 1</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
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
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Pending Tasks -->

        </div>

        <div class="flex flex-col gap-3 h-full w-1/3">
            <!-- Charts -->
            @livewire('dash-board-graph')
            <!-- Charts -->
        </div>



    </div>


@endsection