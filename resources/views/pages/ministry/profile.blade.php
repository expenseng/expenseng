@extends('layouts.master')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
  <link rel="stylesheet" href="{{asset('css/ministry_list.css') }}">
  <title>FG Expense - Ministry List</title>
@endsection
  <!-------------Header starts here-------------->
  <!-- <<br><br> -->
  <!-------------Header ends here-------------->



  @section('content')
  <div class="wrapper">
    <div class="content-1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <ul class="d-flex">
              <li class="items"><a href="#">HOME <span class="circle-1"></span></a></li>

              <li class="items"><a href="#">PROFILES</a><span class="circle-1"></span></li>

              <li class="items"><a href="#">MINISTRIES</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="main-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h1>Federal Ministries</h1>
            <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money
              is being used in communities across America.
              Learn more on how this money was spent with tools to help you navigate
              spending from top to bottom.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="money-spent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 paragraph">
            <p style="padding:0;">MINISTRIES AND AMOUNT SPENT</p>
            <hr>
          </div>
          <div id="search-area" class="col-md-6 mt-3 mt-md-0">
            <input type="search" id="ministry_search" class="form-control form-control-lg mb-2" placeholder="Search for a ministry">
            <div id="ministryList"></div>
            {{-- <button type="submit" id="submit" class="btn btn-block btn-success">Find</button> --}}
            @csrf
          </div>
        </div>
      </div>
    </div>


    <div class="last-section">
      <div class="container-fluid">
        <div id="cards-container" class="row d-flex sec-card">
          @if (count($ministries) >0)
          @foreach($ministries as $ministry)
          <div data-id="{{$ministry->id}}" 
            class="col-lg-3 col-md-6 col-sm-12 ministry-cards" 
            style="cursor:pointer"
          >
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>{{$ministry->ministry_name}}</h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
            <a href="{{ route('ministry_profile_search', $ministry->id) }}"></a>
          </div>

         
          @endforeach
          @endif
          
        </div>
      </div>
    </div>

@endsection

@section('js')
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1500,
    });
  </script> --}}


  <script src="assets/js/ministry_list.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
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
                  <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                  <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
                </div>
                <div class="coat">
                  <img src="{{ asset('images/image 7.png') }}" alt="">
                  <div class="text-center ministry">
                    <h4>${name}</h4>
                  </div>
                </div>
                <div class="texts">
                  <h4>Total amount Spent</h4>
                  <p class="num">#123,446,332</p>
                  <p class="year">2019</p>
                </div>
              </div>
            </div>`
      )
  } 

    $('#cards-container').on('click', '.ministry-cards', function(e){
      const id = $(this).attr("data-id")
      $.ajax({
              url: "{{ route('ministry_get_url') }}",
              method: "GET",
              data: {id},
              success: function(data){
                window.location=data.url;
              }
          })
    })

  const returnDefaults = e =>{
    $.ajax({
        url: "{{ route('ministry_all') }}",
        method: "GET",
        success: function(data){
          data = JSON.parse(data)
          console.log('data', data)
          let ministryCards = '';
          if(data.length>0){    
                data.forEach(ministry=>{
                    const {id, ministry_name} = ministry;
                    ministryCards += card(id, ministry_name);
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
        $.ajax({
            url: "{{ route('ministry_autocomplete') }}",
            method: "POST",
            data: {query, _token},
            success: function(data){
                data = JSON.parse(data)
                let suggestions;
                let ministryCards = '';
                if(data.length>0){
                  suggestions = `<ul class="dropdown-menu" style="display:block; position:relative">`;
                    data.forEach(ministry=>{
                        const {id, ministry_name} = ministry;
                        suggestions += `<li class="pb-2 px-3"><a href="#" class="text-muted "> ${ministry_name}</a></li>`
                        ministryCards += card(id, ministry_name);
                    })
                      suggestions += '</ul>';
                      $('#ministryList').html(suggestions).fadeIn();
                      $('#cards-container').html(ministryCards)
                
                }else{
                    $('#ministryList').fadeOut();
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
      $('#ministry_search').val(ministry);
      $('#ministryList').fadeOut();
      $.ajax({
              url: "{{ route('get_ministry_details') }}",
              method: "GET",
              data: {ministry},
              success: function(data){
                  data = JSON.parse(data)
                  console.log(data)
                  const {id, ministry_name} = data[0]
                  $('#cards-container').html(card(id, ministry_name))
              }

          })
  })
})
  </script>
  @endsection