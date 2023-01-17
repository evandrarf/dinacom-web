@extends('layouts.dashboard')

@section('information')
<div class="w-full h-full flex-col flex -mt-16">

    <form method="POST" class="absolute right-0 mt-14 top-0 mr-16 cursor-pointer" action="{{ route('logout') }}">
        @csrf

        <a href="{{ route('logout') }}" class=" text-white px-4 py-2 rounded bg-red-600" onclick="event.preventDefault();
                    this.closest('form').submit();">Logout</a>
    </form>

    <div class="w-full flex flex-col items-center justify-center h-full mb-4">
        <div>
            <div class="w-60 h-60 rounded-full overflow-hidden">
                <img src="{{asset('storage/' . $user->profile_picture)}}" id="profile_preview"
                    class="object-cover h-full w-full" alt="profile_picture">
            </div>
            <div class="my-4 font-inter flex items-center flex-col justify-center">
                <h1 class="text-3xl font-semibold">{{$user->name}}</h1>
                <h3 class="text-lg text-gray-400 font-light mt-2">{{$user->email}}</h3>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="ml-16 w-2/5">
            <form action="{{route('profile.update')}}" method="POST" class="w-full flex flex-col"
                enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="flex flex-col mb-6 ">
                    <label for="name" class="font-poppins text-md font-normal mb-2">Name</label>
                    <input type="text"
                        class="w-full border-gray-400 border rounded-md font-poppins outline-none  focus:ring-0"
                        name="name" id="name" placeholder="name" value="{{old('name') ?? $user->name}}" required
                        autofocus>
                    @if ($messages = $errors->get('name'))
                    @foreach ((array) $messages as $message)
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @endforeach
                    @endif
                </div>
                <div class="flex flex-col mb-6">
                    <label for="email" class="font-poppins text-md font-normal mb-2">Email Address</label>
                    <input type="email"
                        class="w-full border-gray-400 border rounded-md font-poppins outline-none  focus:ring-0"
                        name="email" id="email" placeholder="Email" value="{{old('email') ?? $user->email}}" required
                        autofocus>
                    @if ($messages = $errors->get('email'))
                    @foreach ((array) $messages as $message)
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @endforeach
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="profile_picture" class="font-poppins text-md font-normal mb-2">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class=""
                        value="{{old('profile_picture') ?? $user->profile_picture}}">
                    @if ($messages = $errors->get('profile_picture'))
                    @foreach ((array) $messages as $message)
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @endforeach
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="mt-8 h-12 text-white font-poppins font-semibold text-lg rounded-md px-6 bg-mainblue ">Save</button>
                </div>
            </form>

        </div>
        <div class="ml-16 w-2/5 mb-3 font-poppins ">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-6">
                    <x-input-label for="current_password" :value="__('Current Password')" class="mb-3" />
                    <x-text-input id="current_password" name="current_password" type="password"
                        class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('New Password')" class="mb-3" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-3" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="h-12 text-white font-poppins font-semibold text-lg rounded-md px-6 bg-mainblue ">Save</button>

                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
