<canvas role="img" class="w-full" id="stats-chart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const statsChart = document.getElementById('stats-chart');

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
                        suggestedMax: 100000000,
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
