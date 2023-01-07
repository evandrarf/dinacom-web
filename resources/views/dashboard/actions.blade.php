@extends('layouts.dashboard')

@section('information')

<div class="w-1/3 h-full">
    <h2 class="font-poppins font-medium text-[20px]">Create New Report</h2>
    <form action="{{route('reports.store')}}" method="POST"
        class="flex flex-col w-full h-ful font-normal  font-poppins text-base text-gray-400">
        @csrf
        <input type="text" name="name" value="{{old('name')}}"
            class="border h-12 border-gray-200 focus:ring-0 outline-none focus:outline-none rounded mt-4 mb-4 placeholder:font-poppins placeholder:text-base placeholder:text-gray-400"
            autofocus required placeholder="Report name">
        <textarea name="description" value="{{old('description')}}"
            class="border placeholder:font-poppins placeholder:text-base placeholder:text-gray-400 border-gray-200 h-20 focus:ring-0 outline-none focus:outline-none rounded mb-4"
            placeholder="Description Report" required></textarea>
        <input type="number" name="amount" value="{{old('amount')}}"
            class="border border-gray-200 focus:ring-0 outline-none h-12 focus:outline-none rounded mb-4 placeholder:font-poppins placeholder:text-base placeholder:text-gray-400"
            placeholder="Amount of money" required>
        <input type="text" name="note" value="{{old('note')}}"
            class="border placeholder:font-poppins placeholder:text-base placeholder:text-gray-400  border-gray-200 h-12 focus:ring-0 outline-none focus:outline-none rounded mb-4"
            placeholder="Note">
        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date" id="date"
            value="{{old('date')}}"
            class="border placeholder:font-poppins placeholder:text-base placeholder:text-gray-400  border-gray-200 h-12 focus:ring-0 outline-none focus:outline-none rounded mb-4"
            required placeholder="Date">
        <select name="type" id="type" data-selected="{{old('type')}}"
            class="border border-gray-200 h-12 focus:ring-0 outline-none focus:outline-none rounded mb-4">
            <option value="" selected disabled hidden>Choose the type</option>
            <option value="income">Income</option>
            <option value="spending">Spending</option>
        </select>
        <button type="submit" class="bg-mainblue text-white font-base py-3 rounded-md mt-4">Create Report</button>
    </form>
</div>

@endsection
