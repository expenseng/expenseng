<template>
<div>
    <div :id="element"></div>
</div>
</template>

<script>
export default {
    data() { 
        return {
            options: {
                chart: {
                    toolbar: {
                    show: false
                },
                    height: 200,
                    type: "area"
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth', 
                    colors: ['green'],
                    width: 1
                },
                series: [{
                    name: '',
                    data: []
                }],
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
            },
            
        }
    },

    props:{
        element:{
            type: String,
            required: true
        },
        data:{
            type: Array,
            required: true
        },
        label:{
            type: String,
            required: true,
        }
    },

    mounted() {       

        //try and see if this can set the element
        this.options.chart.id = this.element;

        //update the label of the chart
        this.options.series[0].name = this.label;

        this.data.forEach(item => {
            this.options.series[0].data.push({
                    y: item.amount,
                    x: item.year,
            })
        })

        var chart = new ApexCharts(document.querySelector("#" + this.element), this.options);
        chart.render();
    },
}
</script>
