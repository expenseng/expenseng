$(document).ready(function() {

    const defaultTableDate = $('.said-date').text();
    let tableOneIsModified = false;
    let tableTwoIsModified = false;
        
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

        $('.reset').on('click', function(e){
            const id = $(this).attr("data-id");
            sort = undefined;
            date = undefined;
            $(this).closest('.modal-content').find('.byDatePicker').val('')
            $(this).closest('.modal-content').find('.monthYearPicker').val('')
            $(this).closest('.modal-content').find('.yearPicker').val('')
            $('.btn-amount.active').removeClass("active");
            $('#day').click()
            if(id === 'apply-filter' && tableOneIsModified == false){
                return
            }
            else if(id === 'apply-filter2' && tableTwoIsModified == false){
                return
            }
            $.ajax({
                url: `/expense/filterExpensesAll/${id}/${date}/${sort}`,
                method: "GET",
                success: function(data){
                    // console.log(data)
                    const table = e.target.closest('#modal').nextElementSibling;
                    const tableDate = table.closest('.main-table').querySelector('.said-date');
                    table.innerHTML = data;
                    tableDate.innerHTML = defaultTableDate;
                     id === 'apply-filter' ? tableOneIsModified = false  : tableTwoIsModified = false;           
                },
                error: function(error){
                    console.log(error)
                }
            })
        })

        $('.apply-filter').on('click', function(e){
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
            
            $.ajax({
                    url: `/expense/filterExpensesAll/${id}/${date}/${sort}`,
                    method: "GET",
                    success: function(data){
                        // console.log(data)
                        const table = e.target.closest('#modal').nextElementSibling;
                        const tableDate = table.closest('.main-table').querySelector('.said-date');
                        table.innerHTML = data;         
                        if(date !== undefined){
                            let reportDate = /\d{4}-\d{2}-\d{2}/.test(date)? formatDate(date) : date;
                            tableDate.innerHTML = `<span style="color:#1e7e34">${reportDate}</span>`;
                        }
                        id === 'apply-filter' ? tableOneIsModified = true  : tableTwoIsModified = true;                             
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
            $.ajax({
                url: `/expense/filterExpensesAll/${id}/${date}/${sort}?page=${page}`,
                method: "GET",
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

    //"/expense/filterExpensesAll?page="+page