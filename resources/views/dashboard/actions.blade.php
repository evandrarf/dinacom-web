@extends('layouts.dashboard')

{{-- border-r border-gray-400 w-1/2 flex justify-center items-center h-full {{Route::current()->getName() ==
'dashboard.actions.reports' ? 'bg-gray-300 border-[0.5px] border-black' : ''}} --}}

@section('information')

<div class="w-full h-full flex flex-col font-poppins">
    <div class="w-full h-10 text-sm  mb-6 flex transition-all duration-500">
        <a href="{{route('dashboard.actions.reports')}}" class="w-1/2 text-center flex flex-col items-center">
            <span>Create
                Report</span>
            @if (Route::current()->getName() == 'dashboard.actions.reports')
            <div class="w-full h-[3px] rounded bg-mainblue mt-4"></div>
            @endif
        </a>
        <a href="{{route('dashboard.actions.events')}}" class="w-1/2 text-center flex flex-col items-center">
            <span>Create Event</span>
            @if (Route::current()->getName() == 'dashboard.actions.events')
            <div class="w-full h-[3px] rounded bg-mainblue mt-4"></div>
            @endif
        </a>
    </div>
    <div class="flex w-full">
        @if (Route::current()->getName() == 'dashboard.actions.events')
        @include('dashboard.actions.events')
        @elseif (Route::current()->getName() == 'dashboard.actions.reports')
        @include('dashboard.actions.reports')
        @endif
    </div>
</div>


@endsection
