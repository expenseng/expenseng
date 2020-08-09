$(document).ready(function() {
        
    const defaultTableDate = $('.said-date').text();
    let tableOneIsModified = false;
    
    ///////////////////////////////////////////////////////////////////////
    //                  Date-Picker                               //
    /////////////////////////////////////////////////////////////////////

        $( function() {
            $( "#select-date" ).datepicker({
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

     ///////////////////////////////////////////////////////////////////////////////////////////////////////

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

        $('#expense_search').on('search', searchProject)
    
        $('#expense_search').on('keyup', searchProject)

        function searchProject(){
            const id = $(this).attr("data-id");
            let query = $(this).val();
           
                if(date === undefined){
                    date = 'undefined';
                }
                
            let _token = $('input[name="_token"]').val();
            let data = {query, _token, id, date, sort}
            
            $.ajax({
                url:  `/ministry/filterExpenses`,
                method: "POST",
                data: data,
                success: function(data){
                    // console.log(data)
                    renderTable(data, date, query) 
                },
                error: function(error){
                    console.log(error)
                }
            })
        }


        $('.reset').on('click', function(e){
            const id = $(this).attr("data-id");
            date = "undefined";
            sort = undefined;
            $('#expense_search').val('')
            const data = {id, date, sort};
            $(this).closest('.modal-content').find('.byDatePicker').val('')
            $(this).closest('.modal-content').find('.monthYearPicker').val('')
            $(this).closest('.modal-content').find('.yearPicker').val('')
            $('.btn-amount.active').removeClass("active");
            $('#day').click()
            
            if(tableOneIsModified == false){
                return
            }
            
            $.ajax({
                url: `/ministry/filterExpenses`,
                method: "GET",
                data: data,
                success: function(data){
                    // console.log(data)
                    const table = e.target.closest('#modal').nextElementSibling;
                    const tableDate = table.closest('.main-table').querySelector('.said-date-caption');
                    table.innerHTML = data;
                    tableDate.innerHTML = `Showing expenses for ${defaultTableDate}`;
                    tableOneIsModified = false;         
                },
                error: function(error){
                    console.log(error)
                }
            })
        })

        $('#apply-filter').on('click', function(e){
            const id = $(this).attr("data-id");
            const idjs = e.target.dataset.id;
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
            }else{
                date = 'undefined'
            }
            const data = {id, date};
            if(sort !== undefined){
                data.sort = sort;
            }
            query = $('#expense_search').val();
            data.query = query;
            $.ajax({
                    url: "/ministry/filterExpenses",
                    method: "GET",
                    data: data,
                    success: function(data){
                        renderTable(data, date, query)                                                           
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
        })

        function fetch_data(page, date, sort){
            const id = $('#apply-filter').attr("data-id");
            let query = $('#expense_search').val()
            const data = {id, date, sort, query};
            $.ajax({
                url: "/ministry/filterExpenses?page="+page,
                method: "GET",
                data: data,
                success: function(data){
                    $('#tbl').html(data)                   
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        function renderTable(data, date,query){
            console.log('query', query)
            $('#tbl').html(data)
            const tableDate = document.querySelector('.said-date-caption')
            let msg = '';
            if(query != ''){
                 msg = `containing <b>"${query}"</b>`
            }        
            if(date !== 'undefined'){
                let reportDate = /\d{4}-\d{2}-\d{2}/.test(date)? formatDate(date) : date;
                tableDate.innerHTML = `Showing expenses for <span class="said-date">${reportDate}</span> ${msg}`;
            }else{
                tableDate.innerHTML = `Showing expenses for <span class="said-date">${defaultTableDate}</span> ${msg}`;
            }
            tableOneIsModified = true;         
        }
    });