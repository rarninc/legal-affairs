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
                        @livewire('generate-report')
                        {{-- <form action="{{route('dashboard.generate')}}" method="POST" class="w-full">
                            @csrf
                            <button class="btn btn-sm btn-outline text-white text-lg w-full">Generate Reports</button>
                        </form> --}}
                    </div>
                </div>
            </div>

            <!-- Stats -->
            @include('livewire.dashboard.stats')
            <!-- Stats -->

            <!-- Pending Tasks -->
            @livewire('pending-task-table')
            <!-- Pending Tasks -->

        </div>

        <div class="flex flex-col gap-3 h-full w-1/3">
            <!-- Charts -->
            @livewire('dash-board-graph')
            <!-- Charts -->
        </div>



    </div>


@endsection