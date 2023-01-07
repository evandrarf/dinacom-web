<div class="px-8 h-full overflow-y-auto flex flex-col justify-between items-end w-1/3">
    <div class="w-full mb-8">
        <h6 class="font-poppins font-medium text-base text-gray-400 mb-4">Today</h6>
        @if ($todayReports->isNotEmpty())
        <div class="shadow-md mt-2 px-4 py-3">
            @foreach ($todayReports as $index => $todayReport)
            <div class="w-full my-5 flex items-center">
                <div class="rounded-md w-12 h-12 flex justify-center items-center  @if ($todayReport->type == 'income')
                    bg-blue-600
                @else
                    bg-red-600
                @endif">
                    <img src="{{asset('/icons/' . $todayReport->type . '.png')}}" class="h-2/3" alt="income">
                </div>
                <div class="ml-2 w-5/6 h-full flex flex-col justify-between">
                    <p class="font-poppins font-medium text-[14px]">{{$todayReport->name}}
                        ({{date('Y', strtotime($todayReport->date))}})</p>
                    <div class="font-poppins flex justify-between text-sm text-gray-400 font-light">
                        <span>
                            {{ucfirst($todayReport->type)}}
                        </span>
                        <span>
                            IDR {{number_format($todayReport->amount, 0, ',',
                            '.')}}
                        </span>
                    </div>
                </div>
            </div>
            @if ($todayReport != $todayReports->last())
            <div class="w-full h-[1px] bg-gray-200"></div>
            @endif
            @endforeach
        </div>
        @endif
        <h6 class="font-poppins font-medium text-base text-gray-400 mt-8 mb-4">Yesterday</h6>
        @if ($yesterdayReports->isNotEmpty())
        <div class="shadow-md mt-2 px-4 py-3">

            @foreach ($yesterdayReports as $index => $yesterdayReport)
            <div class="w-full my-5 flex items-center">
                <div class="rounded-md w-12 h-12 flex justify-center items-center  @if ($yesterdayReport->type == 'income')
                    bg-blue-600
                @else
                    bg-red-600
                @endif">
                    <img src="{{asset('icons/' . $yesterdayReport->type . '.png')}}" class="h-2/3" alt="income">
                </div>
                <div class="ml-2 w-5/6">
                    <p class="font-poppins font-medium text-[14px]">{{$yesterdayReport->name}}
                        ({{date('Y', strtotime($yesterdayReport->date))}})</p>
                    <div class="font-poppins flex justify-between text-sm text-gray-400 font-light">
                        <span>
                            {{ucfirst($yesterdayReport->type)}}
                        </span>
                        <span>
                            IDR {{number_format($yesterdayReport->amount, 0, ',',
                            '.')}}
                        </span>
                    </div>
                </div>
            </div>
            @if ($yesterdayReport != $yesterdayReports->last())
            <div class="w-full h-[1px] bg-gray-200"></div>
            @endif
            @endforeach
        </div>
        @else
        <p class="font-poppins  text-sm">
            There is no report in this date
        </p>
        @endif
    </div>

</div>
