/*
*   
* INITIALISE AND DRAW CHART USING CHART.JS
*
*
*/

let type = 'line';//Set chart type

//Set chart data
let data = {
    labels: ['', '', '', '', '', '', '', '', '', '', '', ''],
    //labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
    datasets: [{
        backgroundColor: 'rgba(0, 147, 93, 0.16)',
        borderColor: 'rgba(0, 148, 94, 1)',//Area border color
        borderWidth: 2,//Line width in pixels
        data: [12, 9, 3, 5, 2, 3, 12, 2, 3, 50, 2, 3],//Chart data
        fill: 'origin',
        lineTension: 0,
        pointBackgroundColor: 'rgba(51, 129, 100, 1)',
        pointBorderColor: 'rgba(51, 129, 100, 1)',
        pointBorderWidth: 2
    }]
};

//Set chart display options
let options = {
    scales: { 
        yAxes: [{
            ticks: {
                beginAtZero: true,
                maxTicksLimit: 10,
            },
            scaleLabel: {
                display: true,
                labelString: 'Amount Spent (Billions)',
                fontColor: '#474747'
            }
        }],
        xAxes: [{
            gridLines: {
                offsetGridLines: true,
                display: false,
                tickMarkLength: 5
            },
            ticks: {
                labelOffset: 5,
                maxTicksLimit: 12
            },
            scaleLabel: {
                display: false,
                labelString: 'Months',
                fontColor: '#474747'
            }
        }]
    }, 
    plugins: {
        filler: {
            propagate: true
        }
    },
    legend: {
        display: false
    }
};

const chartCanvas = document.getElementById('expenditure-chart');//Get the chart canvas

let expenditureChart = new Chart(chartCanvas, {type, data, options});//Draw the chart



/*
*   
* HANDLE DATA PRSENTATION - CHART/TABLE DISPLAY
*
*
*/

const chart = document.getElementById('chart');//Get chart
const table = document.getElementById('table');//Get table
const chartButton = document.getElementById('chart-btn');//Get chart button
const tableButton = document.getElementById('table-btn');//Get table button
const chartIcon = chartButton.firstElementChild;//Get chart icon
const tableIcon = tableButton.firstElementChild;//Get chart icon

function setDefaults() {
    chartIcon.style.color = "#00945E";//Set chart icon color - active
    tableIcon.style.color = "#757575";//Set table icon color - inactive
    table.style.display = "none";//Default - do not display table 
    chart.style.display = "";//Default - display chart
}

function toggleDataPresentation(btn_id) {
    if(btn_id == chartButton.id){
        chartIcon.style.color = "#00945E";
        tableIcon.style.color = "#757575";
        table.style.display = "none";
        chart.style.display = "";
    }
    else if(btn_id == tableButton.id){
        chartIcon.style.color = "#757575";
        tableIcon.style.color = "#00945E";
        chart.style.display = "none";
        table.style.display = "";
    }
};


