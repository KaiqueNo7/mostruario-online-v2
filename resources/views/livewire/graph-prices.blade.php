<div class="sm:col-span-2 shadow-md rounded-xl py-4 bg-white dark:bg-slate-600 relative">
    <div class="chart-container" style="position: relative; height:40vh; width:100%">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    var prices = @json($prices);

    var labels = [];
    var dataset1 = [];
    var dataset2 = [];

    prices.forEach(function(price) {
        labels.push('');
        dataset1.push(price.price_gold);
        dataset2.push(price.price_silver);
    });

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Ouro',
                    data: dataset1,
                    radius: 2,
                    borderColor: 'rgba(255, 215, 0, 1)',
                    backgroundColor: 'rgba(255, 215, 0, 0.8)', 
                    tension: 0.1,
                    yAxisID: 'o',
                },
                {
                    label: 'Prata',
                    data: dataset2,
                    radius: 2,
                    borderColor: 'rgba(192, 192, 192, 1)',
                    backgroundColor: 'rgba(192, 192, 192, 1)',
                    tension: 0.1,
                    yAxisID: 'p',
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: true,
            plugins: {
            title: {
                display: false,
            }
            },
            scales: {
            o: {
                type: 'linear',
                display: true,
                position: 'left',
            },
            p: {
                type: 'linear',
                display: true,
                position: 'right',

                grid: {
                    drawOnChartArea: true,
                },
            },
            }
        },
    });
    </script>
</div>
