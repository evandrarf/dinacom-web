@extends('layouts.dashboard')

@section('information')
<div class="w-full h-full flex">

    <div class="w-1/4 flex flex-col justify-start h-full">
        <div class="w-72 h-72 rounded-full overflow-hidden">
            <img src="{{asset('storage/' . $user->profile_picture)}}" id="profile_preview" class="object-cover w-full"
                alt="profile_picture">
        </div>
        <div class="mt-8 font-inter">
            <h1 class="text-3xl font-semibold">{{$user->name}}</h1>
            <h3 class="text-lg text-gray-400 font-light mt-2">{{$user->email}}</h3>
        </div>
    </div>
    <div class="ml-16 w-2/5">
        <form action="{{route('profile.update')}}" method="POST" class="w-full flex flex-col"
            enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="flex flex-col mb-6 ">
                <label for="name" class="font-poppins text-md font-normal mb-2">Name</label>
                <input type="text"
                    class="w-full border-gray-400 border rounded-md font-poppins outline-none  focus:ring-0" name="name"
                    id="name" placeholder="name" value="{{old('name') ?? $user->name}}" required autofocus>
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

            <button type="submit"
                class="mt-8 h-12 text-white font-poppins font-semibold text-lg rounded-lg bg-mainblue w-full">Submit</button>
        </form>
    </div>

</div>
@endsection
