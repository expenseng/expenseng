var options = {
  chart: {
    height: 280,
    type: "area"
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
    categories: [
      'project 1',
      'project 2',
      'project 3',
      'project 4',
      'project 5',
      'project 6',
      'project 7'
     
    ],
    show: false
  },
  axisTicks:{
    show: false
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
