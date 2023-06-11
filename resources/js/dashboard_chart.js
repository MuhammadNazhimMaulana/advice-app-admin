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

if(document.getElementById('thisMonthEvaluation') != null){
    let monthChart = new Chart(
        document.getElementById('thisMonthEvaluation'),
        {
            type: 'pie',
            data: data,
            options: {
                animation: {
                    onComplete:  () => {
                    
                    // Download Image 
                    let url = $("#download-month");
                    
                    // Change Value
                    url.attr("href", monthChart.toBase64Image());
        
                    // Show Button
                    url.removeClass("d-none")
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Penilaian Bulan Ini'
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


if(document.getElementById('thisYearEvaluation') != null){
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

let yearlyChart = new Chart(
    document.getElementById('thisYearEvaluation'),
    {
        type: 'pie',
        data: data_yearly,
        options: {
            animation: {
                onComplete:  () => {
                
                // Download Image 
                let url = $("#download-year");
                
                // Change Value
                url.attr("href", yearlyChart.toBase64Image());
    
                // Show Button
                url.removeClass("d-none")
                },
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Penilaian Tahun Ini'
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