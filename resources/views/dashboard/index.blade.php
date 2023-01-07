@extends('layouts.dashboard')

@section('information')

<div class="w-2/3 h-full flex flex-col justify-between">
    @include('components.home.card-home')
    <div class="flex justify-between w-full my-28">
        <div class="flex flex-col">
            @include('components.home.insight-this-month')
            @include('components.home.insight-last-month')
        </div>
        @include('components.home.expense')
    </div>
    @include('components.home.day-report')
</div>


@endsection
