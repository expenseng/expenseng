$(document).ready(function() {
        
    ///////////////////////////////////////////////////////////////////////
    //                  Date-Picker                               //
    /////////////////////////////////////////////////////////////////////

        $( function() {
            $( ".byDatePicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                beforeShow: function(input, inst) {
                    $(document).off('focusin.bs.modal');
                },
                onClose:function(){
                    $(document).on('focusin.bs.modal');
                }
            }).focus(function(){
                $('.ui-datepicker-calendar').show();
            });
          });

        $(function() {
                $('.monthYearPicker').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy',
                    beforeShow: function(input, inst) {
                        $(document).off('focusin.bs.modal');
                    },
                    onClose:function(){
                        $(document).on('focusin.bs.modal');
                    }
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
                dateFormat: 'yy',
                beforeShow: function(input, inst) {
                    $(document).off('focusin.bs.modal');
                },
                onClose:function(){
                    $(document).on('focusin.bs.modal');
                }
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

        $('.modals').on('click', '.btn', function(e) {
            console.log(e.target.id)
            if(e.target.classList.contains('btn-amount')){
                $('.btn-amount.active').removeClass("active");
                $(this).addClass("active");
            }else if(e.target.classList.contains('btn-date')){
                $('.btn-date.active').removeClass("active");
                $(this).addClass("active");
                if($('.btn-date.active').hasClass('month')){
                    $('.byDatePicker').hide()
                    $('.monthYearPicker').show()   
                    $('.yearPicker').hide()
                }else if($('.btn-date.active').hasClass('day')){
                    $('.byDatePicker').show()
                    $('.monthYearPicker').hide()
                    $('.yearPicker').hide()
                }else if($('.btn-date.active').hasClass('year')){
                    $('.byDatePicker').hide()
                    $('.monthYearPicker').hide()
                    $('.yearPicker').show()
                }
            }        
        });

        let date, sort, active;

        $('.apply-filter').on('click', function(e){
            const id = $(this).attr("data-id");
            console.log(id)
            let invalid = false;
            console.log($(this).closest('.modal-content').find('.byDatePicker').val())
           
            if($('.btn-date.active').hasClass('day')){
                date = $(this).closest('.modal-content').find('.byDatePicker').val();
                active = 'day';
                console.log(date)
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
            const data = {id, date};
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
                        const table = e.target.closest('#modal').nextElementSibling;
                        const tableDate = table.closest('.main-table').querySelector('.said-date');
                        table.innerHTML = data;
                        let reportDate = /\d{4}-\d{2}-\d{2}/.test(date)? formatDate(date) : date;
                        tableDate.innerHTML = `<span style="color:#1e7e34">${reportDate}</span>`;           
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
        })

        $(document).on('click', '.pagination a', function(e){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            let table = e.target.closest('.table-data');
            let id = table.dataset.id
            fetch_data(e, id, table, page, date, sort)

        })

        function fetch_data(e, id, table, page, date, sort){
            const data = {id, date, sort};
            $.ajax({
                url: "/expense/filterExpensesAll?page="+page,
                method: "GET",
                data: data,
                success: function(data){
                    // console.log(data)
                    table.innerHTML = data;          
                },
                error: function(error){
                    console.log(error)
                }
            })
        }
    });