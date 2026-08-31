import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll('[data-chart]');

    containers.forEach((container) => {
        const type = container.dataset.chart;
        const labels = JSON.parse(container.dataset.labels ?? '[]');
        const values = JSON.parse(container.dataset.values ?? '[]');
        const isDoughnut = type === 'doughnut';

        const colors = isDoughnut
            ? ['#0f766e', '#0d9488', '#14b8a6', '#2dd4bf', '#f59e0b', '#d97706', '#115e59', '#99f6e4']
            : ['#0f766e'];

        new Chart(container, {
            type,
            data: {
                labels,
                datasets: [
                    {
                        label: container.dataset.label ?? 'Jumlah',
                        data: values,
                        backgroundColor: isDoughnut ? colors : colors[0] + '99',
                        borderColor: colors[0],
                        borderWidth: 1,
                        borderRadius: isDoughnut ? 0 : 6,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: isDoughnut,
                        position: 'bottom',
                        labels: { font: { family: 'Instrument Sans' } },
                    },
                },
                scales: isDoughnut
                    ? {}
                    : {
                          y: {
                              beginAtZero: true,
                              ticks: { precision: 0 },
                              grid: { color: '#e2e8f0' },
                          },
                          x: { grid: { display: false } },
                      },
            },
        });
    });
});