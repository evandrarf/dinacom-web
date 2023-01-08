@extends('templates.default')

@section('content')
<div class="w-screen h-screen overflow-hidden bg-mainblue flex">
    {{-- Sidebar --}}
    <div class="w-28 mb-8 bg-mainblue h-full flex items-center flex-col justify-between py-14">
        <a href="{{route('dashboard')}}" class="flex flex-col justify-center items-center">
            <img src="{{asset('/app-logo.png')}}" class="w-16 h-16" alt="app-logo">
            <span class="font-inter font-semibold text-white text-xs mt-1">Financekuu</span>
        </a>
        <div class="flex flex-col">
            <a href="{{route('dashboard')}}" class="flex justify-center items-center w-20 h-20 rounded-full flex-col @if (Route::current()->getName() == 'dashboard')
                bg-bluelowopacity
            @endif">
                <img src="{{asset('/icons/home-icon.png')}}" class="w-8" alt="home">
                <span class="font-inter text-[10px] mt-1 text-white">Home</span>
            </a>
            <a href="{{route('dashboard.stats')}}" class="mt-6 flex justify-center items-center w-20 h-20 rounded-full flex-col @if (Route::current()->getName() == 'dashboard.stats')
                bg-bluelowopacity
            @endif">
                <img src="{{asset('/icons/stats-icon.png')}}" class="w-8" alt="home">
                <span class="font-inter text-[10px] mt-1 text-white">Stats</span>
            </a>
            <a href="{{route('dashboard.actions')}}" class="mt-6 flex justify-center items-center w-20 h-20 rounded-full flex-col @if (Route::current()->getName() == 'dashboard.actions')
                bg-bluelowopacity
            @endif">
                <img src="{{asset('/icons/action-icon.png')}}" class="w-8" alt="home">
                <span class="font-inter text-[10px] mt-1 text-white">Action</span>
            </a>
            <a href="{{route('dashboard.settings')}}" class="mt-6 flex justify-center items-center w-20 h-20 rounded-full flex-col @if (Route::current()->getName() == 'dashboard.settings')
                bg-bluelowopacity
            @endif">
                <img src="{{asset('/icons/setting-icon.png')}}" class="w-8" alt="home">
                <span class="font-inter text-[10px] mt-1 text-white">Setting</span>
            </a>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{route('logout')}}" class="" onclick="event.preventDefault();
            this.closest('form').submit();"><img src="{{asset('/icons/logout-icon.png')}}" class="w-8" alt=""></a>
            </form>
        </div>
    </div>
    <div class="bg-white flex flex-col w-full h-full rounded-tl-[50px] rounded-bl-[50px] py-[60px] px-12 ">
        <div class="h-[86px] flex justify-between items-center">
            <div
                class="w-[800px] h-10 rounded-md shadow font-poppins py-2 flex items-center px-7 font-semibold text-gray-300">
                <img src="{{asset('/icons/search-icon.png')}}" alt="search" class="w-4 h-4">
                <input class="w-full border-none outline-0 focus:ring-0 text-xs text-gray-400 placeholder:text-gray-400"
                    type="search" name="search" id="search" placeholder="Search for something">
            </div>
            <div class="flex max-w-md">
                <a class="cursor-pointer mr-10">
                    <img src="{{asset('/icons/mail-icon.png')}}" class="h-10" alt="mail">
                </a>
                <a class="cursor-pointer mr-10 relative">
                    <img src="{{asset('/icons/notif-icon.png')}}" class="h-10" alt="mail">
                    @if (false)
                    <div class="w-3 flex justify-center items-center h-3 rounded-full right-0 bg-white absolute top-2">
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                    </div>
                    @endif
                </a>
                <a href="{{route('dashboard.settings')}}"
                    class="cursor-pointer items-center justify-between flex flex-row max-w-xs">
                    <div class="w-12 h-12 rounded-full border-[1px] border-gray-200 shadow-sm overflow-hidden">
                        <img src="{{asset('storage/' . $user->profile_picture)}}" class="object-cover"
                            alt="profile-pic">
                    </div>
                    <div class="flex flex-col ml-4">
                        <p class="font-poppins font-medium text-base">{{$user->name}}</p>
                        <span class="font-poppins text-xs text-gray-400">{{$user->email}}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="h-full w-full  mb-4 flex  pt-8">
            @yield('information')
        </div>
    </div>
</div>
@endsection
