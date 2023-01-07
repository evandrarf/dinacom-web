<div class="w-[352px] h-[182px] shadow-md p-5 font-poppins flex flex-col justify-between font-light">
    <div class="w-full h-[60%] flex justify-between">
        <div class="h-full w-2/3 flex flex-col justify-between">
            <div class="">
                <h5 class="text-base font-normal">Expense</h5>
                <span class="text-[14px] text-gray-400">{{$date->format('1 M Y')}} - {{$date->format('d M Y')}}</span>
            </div>
            <p class="font-medium text-xl">IDR {{number_format($thisMonthSpending, 0, ',', '.')}}</p>
        </div>
        <div class="w-1/3">
            <canvas role="img" class="w-full" id="home-chart"></canvas>
        </div>
    </div>
    <div>
        <div class="w-full h-[1px] bg-gray-300 mt-2"></div>
        <div class="w-full flex mt-2">
            <div class="px-4 py-1 bg-blue-600 text-white text-xs rounded-full mr-3">{{number_format($thisMonthIncome /
                ($thisMonthIncome +
                $thisMonthSpending) *
                100, 2, ',', '.')}}% Income</div>
            <div class="px-4 py-1 bg-red-600 text-white text-xs rounded-full">{{number_format($thisMonthSpending /
                ($thisMonthSpending
                +
                $thisMonthIncome) *
                100, 2, ',', '.')}}% Expense</div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let data = [{month: 'Expense', count: <?php echo($thisMonthSpending) ?>}, {month: 'Income', count: <?php echo($thisMonthIncome) ?>}];

    (async function () {

        new Chart(document.getElementById("home-chart"), {
        type: "doughnut",
        data: {
            labels: data.map((row) => row.month),

            datasets: [
                {
                    data: data.map((row) => row.count),
                    backgroundColor: ['rgb(220 38 38)', 'rgb(37 99 235)']
                },
            ],
        },
        options: {
                animation: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
            },
    });
    })();

</script>
