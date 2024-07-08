<div>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    var prices = @json($prices);

    var labels = [];
    var dataset1 = [];

    prices.forEach(function(price) {
        labels.push(price.created_at);
        dataset1.push(price.price_gold);
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
                    borderWidth: 1,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }
            ]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    </script>
</div>
