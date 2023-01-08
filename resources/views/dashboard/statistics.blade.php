@extends('layouts.dashboard')

@section('information')
<div class="w-full h-full flex font-poppins">
    <div class="w-2/3 flex flex-col h-full">
        <div class="w-full h-[60%] flex flex-col items-center">
            @include('components.statistics.statistics-chart')
        </div>
        <div class="h-[40%] mt-12">
            <h4 class="text-normal font-medium mt-4">All Reports History</h4>
            <div class="overflow-y-auto h-full">
                @include('components.statistics.all-reports')
            </div>
        </div>
    </div>
    <div class="w-1/3  h-full flex flex-col px-6">
        <div class="h-2/3 w-full">
            <h3 class="text-normal font-medium mt-4">All Planning Events</h3>
            <div class="h-full overflow-y-auto">
                @include('components.statistics.all-events')
            </div>
        </div>
        <div class="w-full h-1/3 overflow-y-auto ">
            <div class="">

            </div>
        </div>
    </div>
</div>

@endsection
