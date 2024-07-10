<div class="col-span-2">
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
        var date = new Date(price.created_at);
        labels.push(date.toLocaleDateString('pt-BR'));
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
                    borderWidth: 4,
                    borderColor: 'rgba(255, 215, 0, 1)',  // Cor de Ouro
                    backgroundColor: 'rgba(255, 215, 0, 0.2)',  // Cor de Ouro com transparência
                    yAxisID: 'yGold',  // ID do eixo y para o Ouro
                    tension: 0.3
                },
                {
                    label: 'Prata',
                    data: dataset2,
                    borderWidth: 4,
                    borderColor: 'rgba(192, 192, 192, 1)',  // Cor de Prata
                    backgroundColor: 'rgba(192, 192, 192, 0.2)',  // Cor de Prata com transparência
                    yAxisID: 'ySilver',  // ID do eixo y para a Prata
                    tension: 0.3
                },
            ]
        },
        options: {
            responsive: true,  // Tornar o gráfico responsivo
            maintainAspectRatio: false,  // Permitir que o gráfico seja redimensionado sem manter a proporção
            scales: {
                yGold: {  // Configurações para o eixo y do Ouro
                    type: 'linear',
                    position: 'left',
                    beginAtZero: true,
                    ticks: {
                        color: '#000'  // Cor dos ticks de Ouro
                    }
                },
                ySilver: {  // Configurações para o eixo y da Prata
                    type: 'linear',
                    position: 'right',
                    beginAtZero: true,
                    ticks: {
                        color: '#000'  // Cor dos ticks de Prata
                    },
                    grid: {
                        drawOnChartArea: false  // Evitar desenhar as linhas de grid do eixo y da Prata no gráfico
                    }
                }
            }
        }
    });
    </script>
</div>
