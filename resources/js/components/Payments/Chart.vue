<template>
<div>
    <div :id="element"></div>
    <!-- <apexchart width="500" type="line" :options="options" :series="series"></apexchart> -->
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
                    name: 'Expenses',
                    data: [
                        {
                            x: "2032",
                            y: 223912
                        },
                        {
                            x: "2022",
                            y: 223992032
                        }
                    ]
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
