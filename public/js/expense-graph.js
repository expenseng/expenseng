$(document).ready(function() {
        
    ///////////////////////////////////////////////////////////////////////
    //                  Date-Picker                               //
    /////////////////////////////////////////////////////////////////////

        $( function() {
            $( "#select-date" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
            }).focus(function(){
                $('.ui-datepicker-calendar').show();
            });
          });

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

    ///////////////////////////////////////////////////////////////////////////////////       
    //////////                 Utilities                                //////////////
    /////////////////////////////////////////////////////////////////////////////////
        
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

    const reverseDateFormat= date => {
        
        let splitDate = date.split('-'); 
        let reverseArray = splitDate.reverse(); 
        let joinArray = reverseArray.join('-'); 
        return joinArray; 
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
                }else if($('.btn-date.active').attr('id') === 'day'){
                    $('#select-date').show()
                    $('#select-month').hide()
                    $('#select-year').hide()
                }else if($('.btn-date.active').attr('id') === 'year'){
                    $('#select-date').hide()
                    $('#select-month').hide()
                    $('#select-year').show()
                }
            }        
        });

        let date, sort, active;

        $('#apply-filter').on('click', function(e){
            
            let invalid = false;
            
           
            if($('.btn-date.active').attr('id') === 'day'){
                date = $('#select-date').val();
                active = 'day';
            }
            else if($('.btn-date.active').attr('id') === 'month'){
                date = $('#select-month').val()
                active = 'month';
            }
            else if($('.btn-date.active').attr('id') === 'year'){
                date = $('#select-year').val();
                active = 'year';
            }
            if($('.btn-amount.active').attr('id') === 'asc'){
                sort = 'asc'
            }else if($('.btn-amount.active').attr('id') === 'desc'){
                sort = 'desc'
            }
           
            if(date === ''){
                invalid = true;
                $('#date-format-err').hide().html('Please select a date or click <b style="color:black; font-size:12px">&times;</b> to exit')
                .fadeIn().delay(3000).fadeOut('slow')
            }else{
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
            date = reverseDateFormat(date);
            const data = {date};
            if(sort !== undefined){
                data.sort = sort;
            }
            console.log('data gets here', data)
            $.ajax({
                    url: "/expense/filterExpensesAll",
                    method: "GET",
                    data: data,
                    success: function(data){
                        // console.log(data)
                        $('.table-data').html(data)
                        let reportDate = /\d{4}-\d{2}-\d{2}/.test(date)? formatDate(date) : date
                        $('#said-date').html(`Date: <span style="color:#1e7e34">${reportDate}</span>`)
                       
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
        })

        $(document).on('click', '.pagination a', function(){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            fetch_data(page, date, sort)
            console.log('I was clicked')
        })

        function fetch_data(page, date, sort){
            const data = {date, sort};
            console.log('I was clicked 2')
            $.ajax({
                url: "/expense/filterExpensesAll?page="+page,
                method: "GET",
                data: data,
                success: function(data){
                    console.log(data)
                    $('.table-data').html(data)                   
                },
                error: function(error){
                    console.log(error)
                }
            })
        }
    });
