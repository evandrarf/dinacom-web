<div class="w-full min-h-fit mb-24 mt-5 flex-col flex">
    @if ($events->isEmpty())
        <span class="text-sm text-gray-500">No Planning Event Yet</span>
    @endif
    @foreach ($events as $event)
        <div class="flex flex-col h-24 w-full my-3">
            {{-- <div class="flex justify-between items-center ">
                <h5 class=" font-medium">{{ $event->name }}</h5>
                <span
                    class="text-sm">{{ date_diff(date_create($date), date_create($event->date))->format('%a days
                                                                            left') }}</span>
            </div>
            <div class="flex justify-between mt-2 text-xs text-gray-500">
                <p class="">Estimated Cost : IDR {{ number_format($event->estimated_cost, 0, ',', '.') }}</p>
                <span>{{ date('d M Y', strtotime($event->date)) }}</span>
            </div> --}}
            <div class="flex flex-col justify-center">
                <div class="flex justify-between">
                    <h5 class="font-medium w-3/4">{{ $event->name }}</h5>
                    <span
                        class="text-sm">{{ date_diff(date_create($date), date_create($event->date))->format('%a days
                                                                                                                                                                                                                                                                                                                                left') }}</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-2">
                    <p class="">Estimated Cost : IDR {{ number_format($event->estimated_cost, 0, ',', '.') }}</p>
                    <span>{{ date('d M Y', strtotime($event->date)) }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
