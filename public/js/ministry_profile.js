$(document).ready(function() {
        
    ///////////////////////////////////////////////////////////////////////
    //                  Date-Picker                               //
    /////////////////////////////////////////////////////////////////////
        $(function() {
                $('.monthYearPicker').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy'
                }).focus(function() {
                    let thisCalendar = $(this);
                    $('.ui-datepicker-calendar').detach();
                    $('.ui-datepicker-close').click(function() {
            let month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            thisCalendar.datepicker('setDate', new Date(year, month, 1));
                    });
                });
            });

            $(function() {
                $('.yearPicker').datepicker({
                    changeMonth: false,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy'
                }).focus(function() {
                    let thisCalendar = $(this);
                    $('.ui-datepicker-calendar').detach();
                    $('[data-handler="prev"]').hide()
                    $('[data-handler="next"]').hide()
                    $('.ui-datepicker-month').hide()
                    $('.ui-datepicker-close').click(function() {
                    let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    thisCalendar.datepicker('setDate', new Date(year, 1, 1));
                    });
                });
            });
           
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
        
     const insertCommas = amount =>{
            const parts = amount.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

    const formatDate = date => {
        const createDate = new Date(date)
        const parts = createDate.toString().split(" ").filter((item, i) => i > 0 && i < 4) 
        return `${parts[1]} ${parts[0]}, ${parts[2]}`
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////

     $('.tabs').click(function() {
            $('.tabs.active').removeClass("active");
            $(this).addClass("active");
     });

        $('#modal').on('click', '.btn', function(e) {
            if(e.target.classList.contains('btn-amount')){
                $('.btn-amount.active').removeClass("active");
                $(this).addClass("active");
            }else if(e.target.classList.contains('btn-date')){
                $('.btn-date.active').removeClass("active");
                $(this).addClass("active");
                if($('.btn-date.active').attr('id') === 'month'){
                    $('#select-date').hide()
                    $('#select-month').show()   
                    $('#select-year').hide()
                    $('#filter-choice').text('Select Month')
                }else if($('.btn-date.active').attr('id') === 'day'){
                    $('#select-date').show()
                    $('#select-month').hide()
                    $('#select-year').hide()
                    $('#filter-choice').text('Select Date')
                }else if($('.btn-date.active').attr('id') === 'year'){
                    $('#select-date').hide()
                    $('#select-month').hide()
                    $('#select-year').show()
                    $('#filter-choice').text('Select Year')
                }
            }        
        });

        $('#apply-filter').on('click', function(){
            const id = $(this).attr("data-id");
            let date, sort;
           
            if($('.btn-date.active').attr('id') === 'day'){
                date = $('#select-date').val()
            }
            else if($('.btn-date.active').attr('id') === 'month'){
                date = $('#select-month').val()
            }
            else if($('.btn-date.active').attr('id') === 'year'){
                date = $('#select-year').val()
            }
            if($('.btn-amount.active').attr('id') === 'asc'){
                sort = 'asc'
            }else if($('.btn-amount.active').attr('id') === 'desc'){
                sort = 'desc'
            }
   
            const data = {id, date}
            if(sort !== undefined){
                data.sort = sort;
            }
            console.log(data)
            $.ajax({
                    url: "/ministry/filterExpenses",
                    method: "GET",
                    data: data,
                    success: function(data){
                        
                        data = JSON.parse(data)
                        console.log(data)
                        const {payments} = data
                        let back = true;
                        let html = "";
                        if(payments.length > 0){
                            for(payment of payments){
                            back = !back;
                            let shade = back ? 'back': '';
                            html +=  `<tr  class="{shade}">
                                        <td> ${payment.description}</td>
                                        <td> ${payment.beneficiary}</td>
                                        <td> ₦${insertCommas(payment.amount.toFixed(2))}</td>
                                        <td> ${formatDate(payment.payment_date)}</td>
                                    </tr>`                     
                            }
                        }else{
                            html += `<b style="color: red">No data available for this day</b>`
                        }
                        let reportDate = /\d{4}-\d{2}-\d{2}/.test(data.givenTime)? formatDate(data.givenTime) : data.givenTime
                        $('#said-date').html(`Date: <span style="color:#1e7e34">${reportDate}</span>`)
                        $('#expense-table').html(html)
                    }

                })
        })
    });