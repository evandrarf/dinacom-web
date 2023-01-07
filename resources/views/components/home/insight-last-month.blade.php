<div class="flex w-[380px] items-center justify-between mt-4 bg-blue-500 py-4 rounded-2xl text-white px-8">
    <div>
        <img src="{{asset('icons/insight-orange.png')}}" alt="insight" class="w-12">
    </div>
    <div class="flex flex-col justify-center  ml-2">
        <p class="font-poppins font-medium text-[18px]">Insights</p>
        <span class="font-poppins font-normal text-[10px]">Last Month Balance</span>
    </div>
    <div class="w-[1px] mx-2 bg-white h-5/6"></div>
    <div class="ml-2 flex flex-col justify-center">
        <p class="font-poppins font-medium text-[18px]">IDR {{number_format($lastMonthBalance, 0, ',', '.')}}</p>
        <span class="font-poppins font-normal text-[10px] ">
            <span class="@if($balanceDiffLastMonthPercentage < 0) text-red-300 @else text-green-300 @endif">
                @if($balanceDiffLastMonthPercentage
                > 0) +@endif{{number_format($balanceDiffLastMonthPercentage, 2, ',' , '.' )}}%</span> vs last month
        </span>
    </div>
</div>
