<div class = "h-full flex flex-col">
    @if(session('success'))
        <div class="toast toast-top toast-center">                
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{session('success')}}</span>
            </div>
        </div>
    @endif
    <!-- Add Document Record Modal -->
    @include('livewire.document-tracker.add')
    <!-- Add Document Record Modal-->
    
    
    <!-- Update Document Record Modal-->
    @include('livewire.document-tracker.update')


    <!-- View Document -->
    @include('livewire.document-tracker.view')
    <!-- View Document -->


    <!-- Document List -->
    <div class="card w-full bg-base-100 shadow-xl flex-1">
        <div class="card-body h-1 flex flex-col p-5">
            <div class="mb-2 w-full gap-2 flex flex-col items-center">
                <!-- Search and Filter-->
                @include('livewire.document-tracker.search-filter')
                <!-- Search and Filter-->
            </div>
            <!-- Card Options -->
            <div class="scroll-container w-full h-full rounded-xl overflow-x-auto">
                <div class="flex flex-col h-1 gap-2">
                @include('livewire.document-tracker.document-list')
                </div>
            </div>
            <!-- Card Options -->
        </div>         
    </div>
    <!-- Document List -->

</div>