@extends('template')

@section('content')
    <!-- Title -->
    <div class="divider divider-start flex-1"><i class="text-3xl font-semibold p-2">Document Tracker</i></div>
    
    <div class="flex h-full w-full mt-4 gap-2">
        <div class="h-full w-1/4">
            @livewire('document-record')
        </div>
        <div class="h-full w-3/4">
            @livewire('document-board')
        </div>
    </div>
    
@endsection