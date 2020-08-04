var options = {
    chart: {
      height: 250,
      type: "area",
      toolbar: {
        show:false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [
      {
        name: "",
        data: []
      }
    ],
    stroke: {
      curve: 'straight', 
      colors: ['green'],
      width: 1
    },
    grid: {
      show: false
    },
    yaxis: {
      show: false
    },
    fill: {
      type: "gradient",
      colors: ['rgba(0, 148, 94, 0.16), rgba(0, 148, 94, 0)'],
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 1,
        stops: [0, 90, 100]
      }
    },
  noData: {
    text: 'Loading...'
  },
  tooltip: {
    enabled: true,
    y: {
        formatter: function (val, opts) {
            const parts = val.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            val = parts.join(".")        
            return ("₦" + val)
        },
        title: {
            formatter: (seriesName) => seriesName,
        }
    }
}
};

var chartOne = new ApexCharts(document.querySelector("#chartOne"), options);

chartOne.render();

var chartTwo = new ApexCharts(document.querySelector("#chartTwo"), options);

chartTwo.render();

var chartThree = new ApexCharts(document.querySelector("#chartThree"), options);

chartThree.render();

// var chart = new ApexCharts(document.querySelector("#chart3"), options);

// chart.render();


var options = {
  chart: {
    height: 210,
    type: "area",
    toolbar: {
      show:false
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Amount in Millions",
      data: [45, 52, 38, 45, 39, 47, 54]
    }
  ],
  stroke: {
    curve: 'straight', 
    colors: ['green'],
    width: 1
  },
  grid: {
    show: false
  },
  yaxis: {
    show: false
  },
  fill: {
    type: "gradient",
    colors: ['rgba(0, 148, 94, 0.16), rgba(0, 148, 94, 0)'],
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 1,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    show: false,
    labels: {
        show: false
    },
    axisBorder: {
        show: false
    },
},
};

var chart = new ApexCharts(document.querySelector("#chart4"), options);

chart.render();

var chart = new ApexCharts(document.querySelector("#chart5"), options);

chart.render();

var chart = new ApexCharts(document.querySelector("#chart6"), options);

chart.render();


//////////////////////////////////////////////////////////
///////////      Ministry Expenditure       /////////////
////////////////////////////////////////////////////////
const insertCommas = amount =>{
  const parts = amount.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return parts.join(".");
}

window.addEventListener('load', function(event){
      let ministryName = $('#ministry_list').val()
      renderChartsByMonths(event, ministryName)
})

$('#ministry_list').on('change', renderChartsByMonths)

function renderChartsByMonths(event, ministryName){
  let ministry = event.target.value || ministryName;
  $.ajax({
      url: `/changeMinistryCharts/${ministry}`,
      method: "GET",
      success: function(data){
        const {byMonths, byYears, byCompanies} = data;
          $('#annual-sum').html(insertCommas(byMonths.sum.toFixed(2)))
          $('.year-in-focus').html(byMonths.year) 
          chartOne.updateSeries([{
            name: `${byMonths.ministry} - ${byMonths.year} Monthly Expenses`,
            data: byMonths.amounts
          }])             
          chartOne.updateOptions({
            xaxis: {
              show: true,
              categories: byMonths.months,
              labels: {
                  show: true
              }
            }
          })  
          $('#average').html(insertCommas(byYears.average.toFixed(2)))
          $('#years-in-focus').html(`${byYears.years[0]} - ${byYears.years[byYears.years.length - 1]}`) 
          chartTwo.updateSeries([{
            name: `${byMonths.ministry}: 5-year Trend`,
            data: byYears.amounts
          }])             
          chartTwo.updateOptions({
            xaxis: {
              show: true,
              categories: byYears.years,
              labels: {
                  show: true
              }
            }
          })  
          $('#top-company').html(byCompanies.topCompany)
          chartThree.updateSeries([{
            name: `${byMonths.ministry}: Top-10 Beneficiaries`,
            data: byCompanies.amounts
          }])             
          chartThree.updateOptions({
            xaxis: {
              show: true,
              categories: byCompanies.companies,
              labels: {
                  show: true
              }
            },
            chart: {
              type: 'bar',
              height: 250
            },
            plotOptions: {
              bar: {
                horizontal: false,
              }
            },
          })  
      },
      error: function(error){
          console.log(error)
      }
  })
}





// xaxis: {
//   labels: {
//     show: false
//   }
// },
// yaxis: {
//   min: 20,
//   max: 100
// }