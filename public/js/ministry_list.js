$(document).ready(function(){
    
    const card = (id, name)=>{
      return (
        ` <div data-id="${id}" 
            class="col-lg-3 col-md-6 col-sm-12 ministry-cards" 
            style="cursor:pointer"
          >
              <div class="cont-1">
                <div class="img">
                  <span class="circle"></span>
                  <img src="/images/Vector 3.svg" alt="" class="vector" style="width:100%">
                  <img src="/images/Vector 2.png" alt="" style="width:100%">
                </div>
                <div class="coat">
                  <img src="images/image 7.png" alt="">
                  <div class="text-center ministry">
                    <h4>${name}</h4>
                  </div>
                </div>
                <div class="texts">
                  <h4>Total amount Spent</h4>
                  <p class="num">#123,446,332</p>
                  <p class="year">${new Date().getFullYear()}</p>
                </div>
              </div>
            </div>`
      )
  } 

    $('#cards-container').on('click', '.ministry-cards', function(e){
      const id = $(this).attr("data-id")
      $.ajax({
              url: "/ministry/getUrl",
              method: "GET",
              data: {id},
              success: function(data){
                window.location=data.url;
              }
          })
    })

    const returnDefaults = e =>{
    $.ajax({
        url: "/ministry/all",
        method: "GET",
        success: function(data){
          data = JSON.parse(data)
          console.log('data', data)
          let ministryCards = '';
          if(data.length>0){    
                data.forEach(ministry=>{
                    const {id, name} = ministry;
                    ministryCards += card(id, name);
                })
                
                $('#cards-container').html(ministryCards);
                $('#ministryList').fadeOut();
            }
        }
    })
  }

  $('#ministry_search').on('search', returnDefaults)

  $('#ministry_search').on('keyup', function(){
    let query = $(this).val();
    if(query != ''){
        let _token = $('input[name="_token"]').val();
        // console.log(query, _token)
        $.ajax({
            url: "/ministries/autocomplete",
            method: "POST",
            data: {query, _token},
            success: function(data){
              // console.log(data)
                data = JSON.parse(data)
                let suggestions;
                let ministryCards = '';
                if(data.length>0){
                  suggestions = `<ul class="dropdown-menu" style="display:block; position:absolute">`;
                    data.forEach(ministry=>{
                        const {id, name} = ministry;
                        suggestions += `<li class="pb-2 px-3"><a href="#" class="text-muted "> ${name}</a></li>`
                        ministryCards += card(id, name);
                    })
                      suggestions += '</ul>';
                      $('#ministryList').html(suggestions).fadeIn();
                      $('#cards-container').html(ministryCards)
                
                }else{
                    $('#ministryList').fadeOut();
                    $('#cards-container').empty();
                }
            }
        })
    }else{
        $('#ministryList').fadeOut();
        returnDefaults()
    }
  })

  $('#search-area').on('click', 'li', function(e){
      e.preventDefault()
      let ministry = $(this).text();
      console.log(ministry)
      $('#ministry_search').val(ministry);
      $('#ministryList').fadeOut();
      $.ajax({
              url: "/ministry/details",
              method: "GET",
              data: {ministry},
              success: function(data){
                console.log(data)
                  data = JSON.parse(data)
                  console.log(data)
                  const {id, name} = data[0]
                  $('#cards-container').html(card(id, name))
              }

          })
  })
})