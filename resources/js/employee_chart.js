import Chart from 'chart.js/auto';

const data = {
    labels: labels,
    datasets: [
    {
        label: 'Total',
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(0, 139, 139)',
            'rgb(30, 144, 255)',
            'rgb(220, 20, 60)',
            'rgb(255, 228, 225)',
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(0, 139, 139)',
            'rgb(30, 144, 255)',
            'rgb(220, 20, 60)',
            'rgb(255, 228, 225)',
        ],
        data: trans,
    },
]
};

const config = {
    type: 'pie',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('transactionChart'),
    config
);