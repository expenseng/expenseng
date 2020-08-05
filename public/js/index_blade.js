var options = {
    chart: {
      height: 330,
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
        name: "Series 1",
        data: [0,45, 52, 38, 45, 19, 23, 40]
      }
    ],
    stroke: {
        curve: 'straight',
        colors:['#0F9A67'],
      },
    fill: {
      type: "gradient",
      colors: ['rgba(218,239,232,0.8)'],
    
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 1,
        stops: [0, 80, 100],
        
      }
    },
    xaxis: {
        labels:{
            show:false
        },
        title:{
            text:"Expenditure",
            style:{
                fontSize:'20px',
                fontWeight:'bold',
                padding:'30px'
            }
        },
    },
    yaxis: {
        title:{
            text:"Amount spent(Billions)",
            style:{
                fontSize:'20px',
                fontWeight:'bold',
                padding:'30px'
            }
        },
        labels:{
            minWidth: 0,
            maxWidth: 160
        }
    }   
  };
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();
  