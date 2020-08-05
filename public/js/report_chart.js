$(document).ready(function() {
let options = {
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
        name: "",
        data: []
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
            text:"Ministries",
            style:{
                fontSize:'20px',
                fontWeight:'bold',
                padding:'30px'
            }
        },
    },
    yaxis: {
        title:{
            text:"Amount spent (₦)",
            style:{
                fontSize:'20px',
                fontWeight:'bold',
                padding:'30px'
            }
        },
        labels:{
            minWidth: 0,
            maxWidth: 160,
            formatter: function(val){
                return val.toFixed(2)
            }
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

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

///////////////////////////////////////////////////////////////////////////////////       
//////////                 Utilities                                //////////////
/////////////////////////////////////////////////////////////////////////////////
    
const insertCommas = amount =>{
    const parts = amount.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

const reverseDateFormat= date => {
    
    let splitDate = date.split('-'); 
    let reverseArray = splitDate.reverse(); 
    let joinArray = reverseArray.join('-'); 
    return joinArray; 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////// 


let id, date, sort, active;
let chartIsModified = false;

    $('#reset-chart').on('click', function(e){
        // const id = $(this).attr("data-id");
        sort = undefined;
        date = undefined;
        $(this).closest('.modal-content').find('.byDatePicker').val('')
        $(this).closest('.modal-content').find('.monthYearPicker').val('')
        $(this).closest('.modal-content').find('.yearPicker').val('')
        $('.btn-amount.active').removeClass("active");
        $('#day').click()
        if(chartIsModified == false){
            return
        }
       
        renderChartData(id, date, sort)
    })

    $('.apply-filter-chart').on('click', function(e){
        const id = $(this).attr("data-id");
        let invalid = false;
        
        if($('.btn-date.active').hasClass('day')){
            date = $(this).closest('.modal-content').find('.byDatePicker').val();
            active = 'day';
        }
        else if($('.btn-date.active').hasClass('month')){    
            date = $(this).closest('.modal-content').find('.monthYearPicker').val()
            active = 'month';
        }
        else if($('.btn-date.active').hasClass('year')){        
            date = $(this).closest('.modal-content').find('.yearPicker').val();
            active = 'year';
        }
        if($('.btn-amount.active').attr('id') === 'asc'){
            sort = 'asc'
        }else if($('.btn-amount.active').attr('id') === 'desc'){
            sort = 'desc'
        }
        
        if(sort === undefined && date === ''){
            invalid = true;
            $('#date-format-err').hide().html('Select a filter/sort option or click <b style="color:black; font-size:12px">&times;</b> to exit')
            .fadeIn().delay(3000).fadeOut('slow');
        }
        else if(sort !== undefined && date === ''){
            date = undefined;
        }
        else if(date !== ''){
            if(active === 'day'){
                if(!/^(\d{2})-(\d{2})-(\d{4})$/.test(date)){
                    invalid = true;
                    $('#date-format-err').hide().html('Invalid Format! Format: <b>dd-mm-yyyy</b> e.g 01-10-2020')
                    .fadeIn().delay(3000).fadeOut('slow');
                }       
            }else if(active === 'month'){
                if(!/^([A-Za-z]+)\s(\d{4})$/.test(date)){
                    invalid = true;
                    $('#date-format-err').hide().html('Invalid Format! Format: <b>MM yyyy</b> e.g May 2020')
                    .fadeIn().delay(3000).fadeOut('slow')
                }       
            }else if(active === 'year'){
                if(!/^\d{4}$/.test(date)){
                    invalid = true;
                    $('#date-format-err').hide().html('Invalid Format! Format: <b>yyyy</b> e.g 2020')
                    .fadeIn().delay(3000).fadeOut('slow')
                }       
            }
        }
            
        $('.modal').on('hide.bs.modal', function(e) {        
                if(invalid) {           
                e.preventDefault();
                $('.modal').off('hide.bs.modal')
                }  
            });
        
        if(invalid) return;
        if(date !== undefined){
            date = reverseDateFormat(date);
        }

        console.log(id, date, sort)
        renderChartData(id, date, sort)
    })

    function renderChartData(id, date, sort){
        console.log('Reset was here')
        $.ajax({
            url: `/expense/filterExpensesChart/${id}/${date}/${sort}`,
            method: "GET",
            success: function(data){
                console.log(data)
                let {ministries, amounts, type, date} = data;
                if(/^(\d{4})-(\d{2})-(\d{2})$/.test(date)){
                    date = reverseDateFormat(date);
                }
                $('#report-type').html(`(${type}):`)
                $('#report-date').html(date) 
                chart.updateSeries([{
                name: `${type} Expenses per ministry`,
                data: amounts
                }])             
                chart.updateOptions({
                xaxis: {
                    show: true,
                    categories: ministries,
                    labels: {
                        show: true
                    }
                },
                chart: {
                    type: 'bar',
                    height: 330
                },
                plotOptions: {
                    bar: {
                    horizontal: false,
                    }
                },
                })
                chartIsModified = true;                       
            },
            error: function(error){
                console.log(error)
            }
        })
    }

    window.addEventListener('load', renderChartData(id, date, sort))
})



