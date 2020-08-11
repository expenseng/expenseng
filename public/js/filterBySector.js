$(document).ready(function() {

    const defaultTableDate = $('.said-date').text();
    let tableOneIsModified = false;
    let sector = $('.sectors').val();
        
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
                $('[data-handler="prev"]').hide();
                $('[data-handler="next"]').hide();
                $('.ui-datepicker-month').hide();
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
        const createDate = new Date(date);
        const parts = createDate.toString().split(" ").filter((item, i) => i > 0 && i < 4);
        return `${parts[1]} ${parts[0]}, ${parts[2]}`;
    }

    const reverseDateFormat= date => {
        
        let splitDate = date.split('-'); 
        let reverseArray = splitDate.reverse(); 
        let joinArray = reverseArray.join('-'); 
        return joinArray; 
    }

    ///////////////////////Highlight the active tab//////////////////////////////////////////////////////////

     $('.tabs').click(function() {
            $('.tabs.active').removeClass("active");
            $(this).addClass("active");
     });

    ////////////////////////// Filter Functionality ////////////////////////////////////////////////////////////

        $('.modals').on('click', '.btn', function(e) {
            if(e.target.classList.contains('btn-amount')){
                $('.btn-amount.active').removeClass("active");
                $(this).addClass("active");
            }else if(e.target.classList.contains('btn-date')){
                $('.btn-date.active').removeClass("active");
                $(this).addClass("active");
                if($('.btn-date.active').hasClass('month')){
                    $('.byDatePicker').hide();
                    $('.monthYearPicker').show();   
                    $('.yearPicker').hide();
                }else if($('.btn-date.active').hasClass('day')){
                    $('.byDatePicker').show();
                    $('.monthYearPicker').hide();
                    $('.yearPicker').hide();
                }else if($('.btn-date.active').hasClass('year')){
                    $('.byDatePicker').hide();
                    $('.monthYearPicker').hide();
                    $('.yearPicker').show();
                }
            }        
        });

        let date, sort, active;

       
      
        $('#expense_search').on('search', searchProject)
    
        $('#expense_search').on('keyup', searchProject)

        function searchProject(){
            const id = $(this).attr("data-id");
            let query = $(this).val();
            sector = $('.sectors').val();
            
                let _token = $('input[name="_token"]').val();
                let request = {query, _token, id, date, sort, sector}
                $.ajax({
                    url:  `/expense/filterExpensesAll/${id}/${date}/${sort}/${sector}`,
                    method: "POST",
                    data: request,
                    success: function(data){
                    //   console.log(data)
                      const table = document.querySelector('#main-table');
                      renderTable(id,table,data,query)
                       
                    },
                    error: function(error){
                      console.log(error)
                    }
                })
        }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $('.reset').on('click', function(e){
            const id = $(this).attr("data-id");
            $('#expense_search').val('');
            sort = undefined;
            date = undefined;
            $(this).closest('.modal-content').find('.byDatePicker').val('');
            $(this).closest('.modal-content').find('.monthYearPicker').val('');
            $(this).closest('.modal-content').find('.yearPicker').val('');
            $('.btn-amount.active').removeClass("active");
            $('#day').click();
            
            if(tableOneIsModified == false){
                return;
            }
            
            $.ajax({
                url: `/expense/filterExpensesAll/${id}/${date}/${sort}`,
                method: "GET",
                success: function(data){
                    // console.log(data)
                    let payload = data.split('<br/>');
                    const table = e.target.closest('#modal').nextElementSibling;
                    const minitable = document.querySelector('#mini-table');
                    const tableDate = table.closest('.main-table').querySelector('.said-date-caption');
                    table.innerHTML = payload[0];
                    tableDate.innerHTML = `Showing All Expenses`;
                     id === 'apply-filter' ? tableOneIsModified = false  : tableTwoIsModified = false;
                     $('.sectors').val('all');
                     minitable.innerHTML = payload[1];
                },
                error: function(error){
                    console.log(error);
                }
            })
        })

        $('.apply-filter').on('click', function(e){
            const id = $(this).attr("data-id");
            sector = $('.sectors').val();
            console.log(sector)
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
                sort = 'asc';
            }else if($('.btn-amount.active').attr('id') === 'desc'){
                sort = 'desc';
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
                        .fadeIn().delay(3000).fadeOut('slow');
                    }       
                }else if(active === 'year'){
                    if(!/^\d{4}$/.test(date)){
                        invalid = true;
                        $('#date-format-err').hide().html('Invalid Format! Format: <b>yyyy</b> e.g 2020')
                        .fadeIn().delay(3000).fadeOut('slow');
                    }       
                }
            }
                
            $('.modal').on('hide.bs.modal', function(e) {        
                 if(invalid) {           
                    e.preventDefault();
                    $('.modal').off('hide.bs.modal');
                 }  
             });
            
            if(invalid) return;
            if(date !== undefined){
                date = reverseDateFormat(date);
            }
            let query = $('#expense_search').val();
            $.ajax({
                    url: `/expense/filterExpensesAll/${id}/${date}/${sort}/${sector}`,
                    method: "GET",
                    data: {query},
                    success: function(data){
                        // console.log(data)
                        const table = e.target.closest('#modal').nextElementSibling;
                        renderTable(id, table, data, query);    
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
        })

        $(document).on('change', '.sectors', function(e){
            sector = $(this).val();
            const id = $(this).attr("data-id");
            let query = $('#expense_search').val();
            console.log('date', date)
            $.ajax({
                url: `/expense/filterExpensesAll/${id}/${date}/${sort}/${sector}`,
                method: "GET",
                data: {query},
                success: function(data){
                    // console.log(data)
                    let payload = data.split('<br/>');
                    const table = document.querySelector('#main-table');
                    const minitable = document.querySelector('#mini-table');
                    renderTable(id, table, payload[0], query); 
                    minitable.innerHTML = payload[1];             
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
           
            let query = $('#expense_search').val();
            console.log(e, id, table, page, date, sort, query);
            $.ajax({
                url: `/expense/filterExpensesAll/${id}/${date}/${sort}/${sector}?page=${page}`,
                method: "GET",
                data: {query},
                success: function(data){
                    // console.log(data)
                    table.innerHTML = data;          
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        function renderTable(id,table,data,query){
            console.log(data)
            const tableDate = table.closest('.main-table').querySelector('.said-date-caption');
            table.innerHTML = data;
            let msg = '';
            if(query != ''){
                 msg = `containing <b>"${query}"</b>`
            }        
            if(date !== undefined){
                let reportDate = /\d{4}-\d{2}-\d{2}/.test(date)? formatDate(date) : date;
                tableDate.innerHTML = `Showing expenses for <span class="said-date">${reportDate}</span> ${msg}`;
            }else{
                tableDate.innerHTML = `Showing All Expenses`;
            }
            
            id === 'apply-filter2' ? tableTwoIsModified = true  : tableOneIsModified = true;                     
        }
    });
