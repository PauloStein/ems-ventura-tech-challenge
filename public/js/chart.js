var ctx;
var myChart;

function chart(dados) {
    // console.log(JSON.stringify(dados))
    var i = dados.length - 1;
    var j = 0;
    var currencyValues = [];
    var currency;
    var dates = [];
    for (currency of dados) {
        currency.name = dados[0].name;
        currencyValues[j] = dados[i].bid;
        dates[j] = timestampToDate(dados[i].timestamp)
        i--;
        j++;
    }
    ctx = document.getElementById('myChart').getContext('2d');
    myChart = new Chart(document.getElementById("myChart"), {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                data: currencyValues,
                label: currency.name,
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

function timestampToDate(timestamp) {
    var date = new Date(timestamp * 1000);
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var day = date.getDate()
    var month = 1 + date.getMonth();
    var year = date.getFullYear();
    var formattedDate = (day + "/" + month);
    return formattedDate;
}