@extends('templates.default')

@section('content')

<div class="w-screen h-screen overflow-hidden flex flex-row">
    <div class="w-1/3 flex flex-col pl-12 pr-24 py-20 overflow-y-auto">
        <div class="flex items-center">
            <img src="{{asset('/app-logo.png')}}" class="w-20" alt="logo">
            <p class="font-inter font-bold text-2xl ml-2 text-blue-500">Financeku</p>
        </div>
        <div class="mt-4">
            <p class="font-poppins text-gray-400 text-lg"> Welcome to Financeku, Please {{$pages ?? 'login to your
                account.'}}
            </p>
        </div>
        <div class="mt-4">
            @yield('form')
        </div>
    </div>
    <div class="w-2/3 bg-gradient-to-b from-lightblue to-white flex justify-center items-center">
        <img src="{{asset('/orang.png')}}" alt="people" class="w-579">
    </div>
</div>

@endsection
