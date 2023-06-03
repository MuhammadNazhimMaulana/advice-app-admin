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
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Penilaian Bulan Ini'
            }
        }
    }
};

if(document.getElementById('thisMonthEvaluation') != null){
    new Chart(
        document.getElementById('thisMonthEvaluation'),
        config
    );
}

// Yearly
const data_yearly = {
    labels: labels_yearly,
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
        data: trans_yearly,
    },
]
};

const config_yearly = {
    type: 'pie',
    data: data_yearly,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Penilaian Tahun Ini'
            }
        }
    }
};

if(document.getElementById('thisYearEvaluation') != null){
    new Chart(
        document.getElementById('thisYearEvaluation'),
        config_yearly
    );
}