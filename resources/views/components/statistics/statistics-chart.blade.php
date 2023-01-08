<div class="flex w-full justify-between pr-14">
    <h3 class="font-medium">Activity</h3>
    <form class="{{route('dashboard.stats')}}" method="GET">
        <select name="rangeTime"
            class=" text-xs flex  justify-between items-center py-2 border-gray-400 rounded-md focus:border-gray-300 ring-0 focus:outline-none font-poppins font-light"
            id="rangeTime">
            <option value="week" @if ($rangeTimeSelected=="week" || $rangeTimeSelected !='month' || $rangeTimeSelected
                !='year' ) selected @endif>This Week</option>
            <option value="month" @if ($rangeTimeSelected=="month" ) selected @endif>This Month</option>
            <option value="year" @if ($rangeTimeSelected=="year" ) selected @endif>This Year</option>
        </select>
    </form>
</div>
<canvas role="img" class="w-full" id="stats-chart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const statsChart = document.getElementById('stats-chart');
    const rangeTime = document.getElementById("rangeTime")

    rangeTime.addEventListener('change', async () => {
        rangeTime.closest('form').submit();
    });

    console.log({{Js::from($labelData)}})

    const incomeData = Object.values({{Js::from($incomeData)}});
    const spendingData = Object.values({{Js::from($spendingData)}});

    (async function() {
        new Chart(statsChart, {
            type: 'bar',
            data: {
            labels: {{Js::from($labelData)}},
            datasets: [{
                label: 'Spending',
                data: {{Js::from($spendingData)}},
                borderWidth: 1,
                backgroundColor: 'rgba(235,27,0,0.6)',
                borderColor: 'rgba(235,27,0,1)',
            }, {
                label: 'Income',
                data: {{Js::from($incomeData)}},
                borderWidth: 1,
                backgroundColor: 'rgba(3,38,235,0.7)',
                borderColor: 'rgba(3,38,235,1)',
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: Math.max(...incomeData, ...spendingData) + 10 / 100 * Math.max(...incomeData, ...spendingData),
                        title: {
                            display: true,
                            text: 'Total (IDR)',
                            font: {
                                family: "Poppins",
                                size: 12,
                            },
                            padding: {
                                bottom: 20
                            }
                        },
                    }
                },
                responsive: true,
                plugins :{
                    title: {
                        display: true,
                        text: 'Expense and Income'
                    }
                }
            }
        });
    })();

</script>
