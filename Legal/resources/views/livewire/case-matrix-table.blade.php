<div class = "h-full flex flex-col">
    @if(session('success'))
        <div class="toast toast-top toast-center">                
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{session('success')}}</span>
            </div>
        </div>
    @endif
    <!-- Title -->    
    <div class="card h-24 w-full bg-base-100 shadow-xl">
        <div class="card-body flex-row h-24 p-5 items-center">
            <h2 class="card-title text-3xl flex-1">Case Matrix</h2>
            <!-- Add Case Record Modal -->
            @include('livewire.case-matrix.add')
            
            <!-- Add Case Record Modal-->
        </div>
    </div>
    <!-- Title -->

    <!-- Update Case Record Modal-->
    @include('livewire.case-matrix.update')
    <!-- Update Case Record Modal-->


    <!-- View Case -->
    @include('livewire.case-matrix.view')
    <!-- View Case -->

    <!-- Table -->
    @include('livewire.case-matrix.table')
    <!-- Table -->
</div>