var ctx;
var myChart;

function graphic(dados) {
    console.log(JSON.stringify(dados))
    ctx = document.getElementById('myChart').getContext('2d');
    myChart = new Chart(document.getElementById("myChart"),{
        type: 'line',
        data: {
            labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
            datasets: [{
                data: [86,114,106,106,107,111,133,221,783,2478],
                label: "Research time",
                borderColor: "#3e95cd",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Currency value'
            }
        }
    });
}