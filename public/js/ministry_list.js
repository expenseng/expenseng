$(document).ready(function(){

  const insertCommas = amount =>{
      const parts = amount.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return parts.join(".");
  }

  $('#cards-container').on('click', ".ministry-cards", function() {
    window.location = $(this).find("a").attr("href"); 
    return false;
});
  
  const returnDefaults = e =>{
      $.ajax({
          url: "/ministries",
          method: "GET",
          success: function(data){      
                  $('#cards-container').html(data);
                  $('#ministryList').fadeOut();
              },
            error: function(error){
              console.log(error)
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
              console.log('typing...')
              // $('#cards-container').html(data)
                payload = data.split('?')
                let lists = JSON.parse(payload[0])
                $('#cards-container').html(payload[1])
                let suggestions;
                if(lists.length>0){
                  suggestions = `<ul class="dropdown-menu" style="display:block; position:absolute">`;
                    lists.forEach(ministry=>{
                        const {name} = ministry;
                        suggestions += `<li class="pb-2 px-3"><a href="#" class="text-muted "> ${name}</a></li>`
                    })
                      suggestions += '</ul>';
                      $('#ministryList').html(suggestions).fadeIn();
                }else{
                    $('#ministryList').fadeOut();
                }
            },
            error: function(error){
              console.log(error)
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
      $('#ministry_search').val(ministry);
      $('#ministryList').fadeOut();
      $.ajax({
              url: "/ministries",
              method: "GET",
              data: {ministry},
              success: function(data){
                console.log(data)
                $('#cards-container').html(data)
              },
              error: function(error){
                console.log(error)
              }
          })
  })
})