<div class="flex w-full justify-between pr-14">
    <h3 class="font-medium">Activity</h3>
    <form action="">
        <select name="rangeTime"
            class=" text-xs flex  justify-between items-center py-2 border-gray-400 rounded-md focus:border-gray-300 ring-0 focus:outline-none font-poppins font-light"
            id="rangeTime">
            <option value="week" selected>This Week</option>
            <option value="month">This Month</option>
            <option value="year">This Year</option>
        </select>
    </form>
</div>
<canvas role="img" class="w-full" id="stats-chart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const statsChart = document.getElementById('stats-chart');

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
                backgroundColor: 'rgba(235,27,0,0.8)',
            }, {
                label: 'Income',
                data: {{Js::from($incomeData)}},
                borderWidth: 1,
                backgroundColor: 'rgba(3,38,235,0.75)',
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: Math.max(...incomeData, ...spendingData) + 20 / 100 * Math.max(...incomeData, ...spendingData)
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
