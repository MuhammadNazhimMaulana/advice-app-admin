import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels';

Chart.register(ChartDataLabels);

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


if(document.getElementById('transactionChart') != null){
    var myChart = new Chart(
        document.getElementById('transactionChart'),
        {
            type: 'pie',
            data: data,
            options: {
                animation: {
                    onComplete:  () => {
                    
                    // Download Image 
                    let url = $("#download");
                    
                    // Change Value
                    url.attr("href", myChart.toBase64Image());

                    // Show Button
                    url.removeClass("d-none")
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Penilaian Detail',
                    },
                    datalabels: {
                        formatter: Math.round,
                        color: 'Arial',
                        font: {
                            weight: 'bold',
                            size: 16
                        }
                    }
                }
            }
        }
    );
}