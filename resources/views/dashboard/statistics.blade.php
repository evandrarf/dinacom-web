@extends('layouts.dashboard')

@section('information')
<div class="w-full h-full flex font-poppins">
    <div class="w-2/3  h-full">
        <div class="w-full h-2/3 ">
            @include('components.statistics.statistics-chart')
        </div>
        <div class="h-1/3">

        </div>
    </div>
    <div class="w-1/3 bg-red-400  h-full flex flex-col">
        <div class="h-2/3 ">

        </div>
        <div class="w-full h-1/3 overflow-y-auto ">
            <div class="">

            </div>
        </div>
    </div>
</div>

@endsection
