{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @php
$labelClass = "font-poppins font-medium"
$divClass = "flex flex-col mt-12"
$inputClass = "border-r-0 border-t-0 border-l-0 border-b-2 border-black font-poppins outline-none focus:outline-none
focus:border-none"
@endphp --}}

@extends('layouts.auth')

@section('form')
<form method="POST" action="{{ route('login') }}" class="max-w-full">
    @csrf
    <div class="flex flex-col mt-12">
        <label for="email" class="font-poppins font-medium">Email Address</label>
        <input type="email"
            class="border-t-0 border-r-0 px-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-0"
            name="email" id="email" value="{{old('email')}}" required autofocus>
        @if ($messages = $errors->get('email'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex flex-col mt-12">
        <label for="password" class="font-poppins font-medium">Password</label>
        <input type="password"
            class="border-t-0 border-r-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500 px-0 focus:ring-0"
            name="password" id="password" required>
        @if ($messages = $errors->get('password'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex justify-between mt-4 items-center">
        <label for="remember_me" class="items-center flex justify-center cursor-pointer">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 m-0 p-0 text-indigo-600 shadow-sm"
                name="remember">
            <span class="ml-2 text-xs font-poppins text-gray-600">Remember me</span>
        </label>

        <a href="{{route('register')}}" class="font-poppins text-xs text-gray-600">Don't have an account?</a>

    </div>
    <div class="mt-12">
        <button type="submit"
            class="w-full text-white font-poppins font-medium text-lg py-2 rounded bg-gradient-to-bl from-buttonblue to-verylightblue">Login</button>
    </div>
    <div class="mt-12">
        <p class="font-poppins text-gray-400 text-base">By sign up, you agree to Financeku’s <a
                class="text-blue-500 cursor-pointer">Terms of Service</a> & <a
                class="text-blue-500 cursor-pointer">Privacy Policy</a>.
        </p>
    </div>
</form>
@endsection
