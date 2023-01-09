<div class="w-full h-[358px] bg-mainblue rounded-[40px] p-[2px] flex items-center justify-center">
    <div class="bg-white rounded-[40px] h-full w-2/3 flex justify-center flex-col p-14 ">
        <h3 class="font-poppins font-medium text-xl">Current Balance</h3>
        <h2 class="font-poppins font-semibold text-[48px] mt-2">IDR {{number_format($allBalance,0,',','.')}}</h2>
        <div class="w-full flex  font-poppins font-medium text-[20px] mt-10">
            <a href="{{route('dashboard.actions')}}"
                class="flex justify-center items-center w-[176px] h-14 text-white rounded-2xl  bg-mainblue mr-10">Make
                report</a>
            <a href="{{route('dashboard.stats')}}"
                class="flex justify-center items-center rounded-2xl w-[176px] h-14  bg-gray-300">Statistics</a>
        </div>
    </div>
    <div class="w-1/3 flex flex-col justify-around h-full py-12 px-10 font-poppins text-white">
        <div class="flex flex-col justify-end">
            <div class="font-medium text-base">Income</div>
            <div class="font-semibold text-2xl mt-2">IDR {{number_format($incomeBalance,0,',','.')}}</div>
            <div></div>
        </div>
        <div class="w-full h-[2px] bg-white"></div>
        <div class="flex flex-col">
            <div class="font-medium text-base">Spending</div>
            <div class="font-semibold text-2xl mt-2">IDR {{number_format($spendingBalance,0,',','.')}}</div>
            <div></div>
        </div>
    </div>
</div>
