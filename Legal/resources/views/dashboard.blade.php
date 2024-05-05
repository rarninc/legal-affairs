@extends('template')

@section('content')

    <div class="divider divider-start mb-8"><i class="text-3xl font-semibold p-2">Dashboard</i></div>

    <div class="flex h-full gap-3">
        
        <div class="flex flex-col gap-3 w-2/3">
            <!-- Stats -->
            <div class="flex w-full gap-3">
                <div class="stats shadow w-fit bg-info">
                    <div class="stat w-fit">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/briefcase.png" alt="" class="h-14 w-14">
                        </div>
                        <div class="stat-title font-semibold">Cases this Month</div>
                        <div class="stat-value">6</div>
                        <div class="stat-desc font-semibold">May 2024</div>
                        <div class="stat-actions">
                            <a href="case_matrix"><button class="btn btn-sm btn-outline">View Case Matrix</button> </a>
                        </div>
                    </div>
                </div>

                <div class="stats shadow w-fit bg-success">
                    <div class="stat w-fit">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/docs.png" alt="" class="h-14 w-14">
                        </div>
                        <div class="stat-title font-semibold">Proccessed Documents</div>
                        <div class="stat-value">789</div>
                        <div class="stat-desc font-semibold">May 2024</div>
                        <div class="stat-actions">
                            <button class="btn btn-sm btn-outline">More</button> 
                        </div>
                    </div>
                </div>

                <div class="stats shadow w-fit bg-warning">
                    <div class="stat w-fit">
                        <div class="stat-figure text-secondary">
                            <img src="storage/img/cert.png" alt="" class="h-14 w-14">
                        </div>
                        <div class="stat-title font-semibold">CeNoPAC Generated</div>
                        <div class="stat-value">14</div>
                        <div class="stat-desc font-semibold">May 2024</div>
                        <div class="stat-actions">
                            <a href="cenopac_record"><button class="btn btn-sm btn-outline">View Record</button></a>
                            <a href="cenopac"><button class="btn btn-sm">Generate</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats -->

            <div class="flex flex-col h-full w-full gap-3">
                <!-- Charts -->
                <div class="flex h-2/5 w-full justify-evenly">
                    <div class="card h-full w-fit bg-base-100 shadow-xl">
                        <div class="card-body flex h-full p-2">
                            <canvas id="caseChart" class="h-full"></canvas>
                        </div>
                    </div>
                    <div class="card h-full w-fit bg-base-100 shadow-xl">
                        <div class="card-body flex h-full p-2">
                            <canvas id="documentChart" class="h-full"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Charts -->
                <!-- Pending Tasks -->
                <div class="card h-3/5 w-full bg-base-100 shadow-xl">
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
                                    <td><progress class="progress w-full" value="10" max="100"></progress></td>
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 2</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="20" max="100"></progress></td>
                                    <th><div class="badge badge-info">Nonurgent</div></th>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Case 1</div>
                                                <div class="text-sm opacity-50">Case Matrix</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="30" max="100"></progress></td>
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Case 2</div>
                                                <div class="text-sm opacity-50">Case Matrix</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="40" max="100"></progress></td>
                                    <th><div class="badge badge-info">Nonurgent</div></th>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 1</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="80" max="100"></progress></td>
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 2</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="40" max="100"></progress></td>
                                    <th><div class="badge badge-info">Nonurgent</div></th>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Case 1</div>
                                                <div class="text-sm opacity-50">Case Matrix</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="30" max="100"></progress></td>
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Case 2</div>
                                                <div class="text-sm opacity-50">Case Matrix</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="70" max="100"></progress></td>
                                    <th><div class="badge badge-info">Nonurgent</div></th>
                                </tr>
                                <tr>
                                    <th>9</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 1</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="80" max="100"></progress></td>
                                    <th><div class="badge badge-warning">Urgent</div></th>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Document 2</div>
                                                <div class="text-sm opacity-50">Proccess Document</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><progress class="progress w-full" value="20" max="100"></progress></td>
                                    <th><div class="badge badge-info">Nonurgent</div></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Pending Tasks -->
            </div>
        </div>
    
        <div class="flex flex-col gap-3 h-full w-1/3">

            <div class="card h-1/3 w-full bg-indigo-900 shadow-xl">
                <div class="card-body flex h-1 p-5 text-cente text-white relative justify-center items-center">
                    <img src="storage/img/PLM LOGO.png" alt="" class="absolute h-full w-auto opacity-40 p-8">
                    <h3 class="text-5xl font-semibold relative">Hello, Carlo!</h3>
                    <p class="font-semibold text-xl relative">What do you want to do today?</p>

                    <div class="card-actions relative">
                        <i id="datetime" class="btn glass text-2xl text-white font-bold"></i>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card h-2/3 w-full bg-base-100 shadow-xl">
                <div class="card-body flex h-1 p-5">
                    <div class="divider divider-start text-2xl font-semibold text-indigo-900"><i>Recent Activities</i></div>
                    <div class="scroll-container overflow-x-auto">
                        <table class="table table-pin-rows">
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
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Document 2</div>
                                            <div class="text-sm opacity-50">Proccess Document</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Case 1</div>
                                            <div class="text-sm opacity-50">Case Matrix</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Case 2</div>
                                            <div class="text-sm opacity-50">Case Matrix</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Document 1</div>
                                            <div class="text-sm opacity-50">Proccess Document</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>6</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Document 2</div>
                                            <div class="text-sm opacity-50">Proccess Document</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>7</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Case 1</div>
                                            <div class="text-sm opacity-50">Case Matrix</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Case 2</div>
                                            <div class="text-sm opacity-50">Case Matrix</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>9</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Document 1</div>
                                            <div class="text-sm opacity-50">Proccess Document</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>10</th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold">Document 2</div>
                                            <div class="text-sm opacity-50">Proccess Document</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Activities -->
        </div>

    </div>

    
    
    
    

    
@endsection