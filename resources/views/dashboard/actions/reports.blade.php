<div class="w-full h-full flex flex-col items-center px-6 mt-4">
    <h2 class="font-poppins font-medium text-[20px]">Create New Report</h2>
    <form action="{{route('reports.store')}}" method="POST"
        class="flex flex-col w-1/2 h-ful font-normal  font-poppins text-base text-gray-400">
        @csrf
        <input type="text" name="name" value="{{old('name')}}"
            class="border h-12 border-gray-200 focus:ring-0 outline-none focus:outline-none rounded mt-4 mb-4 placeholder:font-poppins placeholder:text-base placeholder:text-gray-400"
            autofocus required placeholder="Report name">
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
        <h4 class="text-black mt-2 mb-4">Select the type :</h4>
        <div class="flex mb-4">
            <div class="flex items-center">
                <input type="radio" id="income" name="type" value="income">
                <label for="income" class="ml-2">Income</label>
            </div>
            <div class="flex items-center ml-4">
                <input type="radio" id="spending" checked name="type" value="spending">
                <label for="spending" class="ml-2">Spending</label>
            </div>
        </div>
        <button type="submit" class="bg-mainblue text-white font-base py-3 rounded-md mt-4">Create Report</button>
    </form>
</div>
