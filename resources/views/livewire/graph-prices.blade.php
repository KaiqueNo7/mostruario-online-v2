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
        //var date = new Date(price.created_at);
        //labels.push(date.toLocaleDateString('pt-BR', { day: 'numeric' }));
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
                    borderWidth: 2,
                    radius: 0,
                    borderColor: 'rgba(255, 215, 0, 1)',  // Cor de Ouro
                    backgroundColor: 'rgba(255, 215, 0, 0.8)',  // Cor de Ouro com transparência
                    yAxisID: 'yGold',  // ID do eixo y para o Ouro
                    tension: 0.1
                },
                {
                    label: 'Prata',
                    data: dataset2,
                    borderWidth: 2,
                    radius: 0,
                    borderColor: 'rgba(192, 192, 192, 1)',  // Cor de Prata
                    yAxisID: 'ySilver',  // ID do eixo y para a Prata
                    tension: 0.1
                },
            ]
        },
        options: {
            responsive: true,  // Tornar o gráfico responsivo
            maintainAspectRatio: false,  // Permitir que o gráfico seja redimensionado sem manter a proporção
            scales: {
                x: {
                    grid: {
                        display: false,
                    }
                },
                yGold: {  // Configurações para o eixo y do Ouro
                    type: 'linear',
                    beginAtZero: true,
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    }
                },
                ySilver: {  // Configurações para o eixo y da Prata
                    type: 'linear',
                    beginAtZero: true,
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                        drawOnChartArea: false  // Evitar desenhar as linhas de grid do eixo y da Prata no gráfico
                    }

                }
            }
        }
    });
    </script>
</div>
