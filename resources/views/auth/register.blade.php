{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.auth')

@php
$pages = "register tp create an account.";
@endphp

@section('form')
<form method="POST" action="{{ route('register') }}" class="max-w-full" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col mt-12">
        <label for="name" class="font-poppins font-medium">Name</label>
        <input type="text"
            class="border-t-0 border-r-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-0"
            name="name" id="name" value="{{old('name')}}" required autofocus>
        @if ($messages = $errors->get('name'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex flex-col mt-12">
        <label for="email" class="font-poppins font-medium">Email Address</label>
        <input type="email"
            class="border-t-0 border-r-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-0"
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
            class="border-t-0 border-r-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500  focus:ring-0"
            name="password" id="password" required>
        @if ($messages = $errors->get('password'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex flex-col mt-12">
        <label for="password_confirmation" class="font-poppins font-medium">Confirm Password</label>
        <input type="password"
            class="border-t-0 border-r-0 border-l-0 border-b border-black font-poppins outline-none focus:border-indigo-500 focus:ring-indigo-500  focus:ring-0"
            name="password_confirmation" id="password_confirmation" required>
        @if ($messages = $errors->get('password_confirmation'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex flex-col mt-8">
        <label for="profile_picture" class="font-poppins font-medium">Profile Picture</label>
        <input type="file" class="outline-none my-4 border-none" name="profile_picture" id="profile_picture"
            value="{{old('profile_picture')}}">
        @if ($messages = $errors->get('profile_picture'))
        @foreach ((array) $messages as $message)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @endforeach
        @endif
    </div>
    <div class="flex justify-between mt-4 items-center">

        <a href="{{route('login')}}" class="font-poppins text-xs text-gray-600">Already registered?</a>
    </div>
    <div class="mt-12">
        <button type="submit"
            class="w-full text-white font-poppins font-medium text-lg py-2 rounded bg-gradient-to-bl from-buttonblue to-verylightblue">Signup</button>
    </div>
    <div class="mt-12">
        <p class="font-poppins text-gray-400 text-base">By sign up, you agree to Financeku’s <a
                class="text-blue-500 cursor-pointer">Terms of Service</a> & <a
                class="text-blue-500 cursor-pointer">Privacy Policy</a>.
        </p>
    </div>
</form>
@endsection
