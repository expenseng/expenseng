var options = {
  chart: {
    toolbar: {
    show: false
  },
    height: 100,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Amount in Millions",
      data: [45, 52, 38, 45, 39, 47, 54]
    },
    {
      name: "Amount in Thousands",
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

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
