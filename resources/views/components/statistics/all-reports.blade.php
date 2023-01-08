<div class="w-full min-h-fit mb-24 mt-5 flex-col flex">
    @if ($reports->isNotEmpty())
    @foreach ($reports as $index => $report)
    <div class="w-full mb-4 flex justify-between items-center px-4 h-16">
        <div class="flex">
            <div
                class="rounded-lg h-12 w-12 flex justify-center items-center  {{$report->type == 'spending' ? 'bg-red-600' : 'bg-blue-600'}}">
                <img class="h-5/6" src="{{asset('icons/' . $report->type . '.png')}}" alt="transaction">
            </div>
            <div class="flex flex-col ml-4 justify-between">
                <p class="font-semibold">{{$report->name}}</p>
                <span class="text-sm text-gray-400">{{date("d F Y", strtotime($report->date))}}</span>
            </div>
        </div>
        <div class="">
            <p class="font-semibold">IDR {{number_format($report->amount, 0, ',', '.')}}</p>
        </div>
    </div>
    @if ($report != $reports->last())
    <div class="w-[90%] h-[1px] bg-gray-200  mb-2"></div>
    @endif
    @endforeach
    @else
    <p class="mt-4 text-gray-400">You don't have any reports yet</p>
    @endif
</div>
