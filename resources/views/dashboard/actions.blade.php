@extends('layouts.dashboard')

@section('information')

<div class="w-full h-full flex flex-col font-poppins">
    <div class="w-full h-10 text-sm border-gray-400 border mb-6 flex bg-gray-100">
        <a href="{{route('dashboard.actions.reports')}}"
            class="border-r border-gray-400 w-1/2 flex justify-center items-center h-full {{Route::current()->getName() == 'dashboard.actions.reports' ? 'bg-gray-300 border-[0.5px] border-black' : ''}}">Create
            Report</a>
        <a href="{{route('dashboard.actions.events')}}"
            class="w-1/2 flex justify-center items-center h-full  {{Route::current()->getName() == 'dashboard.actions.events' ? 'bg-gray-300 border-[0.5px] border-black' : ''}}">Create
            Event</a>
    </div>
    @if (Route::current()->getName() == 'dashboard.actions.events')
    @include('dashboard.actions.events')
    @elseif (Route::current()->getName() == 'dashboard.actions.reports')
    @include('dashboard.actions.reports')
    @endif
</div>


@endsection
