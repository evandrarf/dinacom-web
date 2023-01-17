<div class="w-full h-full flex flex-col items-center px-6 mt-4">
    <h2 class="font-poppins font-medium text-[20px]">Create Event Planning</h2>
    <form action="{{route('events.store')}}" method="POST"
        class="flex flex-col w-1/2 h-full font-normal  font-poppins text-base text-gray-400">
        @csrf
        <input type="text" name="name" value="{{old('name')}}"
            class="border h-12 border-gray-200 focus:ring-0 outline-none focus:outline-none rounded  placeholder:font-poppins placeholder:text-base my-8 placeholder:text-gray-400"
            autofocus required placeholder="Event name">
        <input type="number" name="estimated_cost" value="{{old('estimated_cost')}}"
            class="border border-gray-200 focus:ring-0 outline-none h-12 focus:outline-none rounded mb-8 placeholder:font-poppins placeholder:text-base placeholder:text-gray-400"
            placeholder="Estimated Cost" required>
        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date" id="date"
            value="{{old('date')}}"
            class="border placeholder:font-poppins placeholder:text-base placeholder:text-gray-400  border-gray-200 h-12 focus:ring-0 outline-none focus:outline-none rounded mb-8"
            required placeholder="Date">
        <button type="submit" class="bg-mainblue text-white font-base py-3 rounded-md mt-4">Create Report</button>
    </form>
</div>
{{-- <div>
    @foreach ($events as $event)
    <div>{{$event->name}}</div>
    <div>{{$event->estimated_cost}}</div>
    @endforeach
</div> --}}
