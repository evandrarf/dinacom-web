<div class="w-full min-h-fit mb-24 mt-5 flex-col flex">
    @foreach ($events as $event)
    <div class="flex flex-col h-24 w-full">
        <div class="flex justify-between items-center">
            <h5 class=" font-medium">{{$event->name}}</h5>
            <span class="text-sm">{{date_diff(date_create($date), date_create($event->date))->format('%a days
                left')}}</span>
        </div>
        <div class="flex justify-between mt-2 text-xs text-gray-500">
            <p class="">Estimated Cost : IDR {{number_format($event->estimated_cost, 0, ',', '.')}}</p>
            <span>{{date('d M Y', strtotime($event->date))}}</span>
        </div>
    </div>
    @endforeach
</div>
