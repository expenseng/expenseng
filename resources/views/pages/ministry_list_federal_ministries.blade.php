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

              <li class="items"><a href="../ministry_profile/ministry_profile_comment.html">PROFILES</a><span class="circle-1"></span></li>

              <li class="items"><a href="./ministry_list_comment.html">MINISTRIES</a></li>
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
          <div class="col-6 paragraph">
            <p style="padding:0;">MINISTRIES AND AMOUNT SPENT</p>
            <hr>
          </div>
          <div id="search-area" class="col-6">
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
          <div class="col-3">
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
          </div>

          @endforeach
          @endif
          {{-- <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
{{-- 
    <div class="last-section">
      <div class="container-fluid">
        <div class="row d-flex sec-card">
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="cont-1">
              <div class="img">
                <span class="circle"></span>
                <img src="{{ asset('images/Vector 3.svg') }}" alt="" class="vector" style="width:100%">
                <img src="{{ asset('images/Vector 2.png') }}" alt="" style="width:100%">
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>Ministry of Works </h4>
                </div>
              </div>
              <div class="texts">
                <h4>Total amount Spent</h4>
                <p class="num">#123,446,332</p>
                <p class="year">2019</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
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

$('#ministry_search').keyup(function(){
   
   let query = $(this).val();
   if(query != ''){
       let _token = $('input[name="_token"]').val();
       // console.log(query, _token)
       $.ajax({
           url: "{{ route('ministry_autocomplete') }}",
           method: "POST",
           data: {query, _token},
           success: function(data){
                data = JSON.parse(data)
               console.log('data', data)
               let suggestions;
               let ministryCards = '';
               if(data.length>0){
                suggestions = `<ul class="dropdown-menu" style="display:block; position:relative">`;
                   data.forEach(ministry=>{
                        suggestions += `<li class="pb-2 px-3"><a href="#" class="text-muted "> ${ministry.ministry_name}</a></li>`
                        ministryCards +=  `<div class="col-3" >
                                                <div class="cont-1">
                                                <div class="img">
                                                    <span class="circle"></span>
                                                    <img src="../css/images/Vector 3.svg" alt="" class="vector" style="width:100%">
                                                    <img src="../css/images/Vector 2.png" alt="" style="width:100%">
                                                </div>
                                                <div class="coat">
                                                    <img src="../css/images/image 7.png" alt="">
                                                    <div class="text-center ministry">
                                                    <h4>${ministry.ministry_name}</h4>
                                                    </div>
                                                </div>
                                                <div class="texts">
                                                    <h4>Total amount Spent</h4>
                                                    <p class="num">#123,446,332</p>
                                                    <p class="year">2019</p>
                                                </div>
                                                </div>
                                            </div>`
                   })
                    suggestions += '</ul>';
                    $('#ministryList').fadeIn();
                    $('#ministryList').html(suggestions);
                    $('#cards-container').html(ministryCards)
               }else{
                   $('#ministryList').fadeOut();
               }
                   
            
           }

       })
   }else{
       $('#ministryList').fadeOut();
   }
})

$('#search-area').on('click', 'li', function(e){
    e.preventDefault()
    let ministry = $(this).text();
    $('#ministry_search').val(ministry);
    // console.log('ministry', ministry)
    $('#ministryList').fadeOut();
    $.ajax({
            url: "{{ route('get_ministry_details') }}",
            method: "GET",
            data: {ministry},
            success: function(data){
              
                data = JSON.parse(data)
                $('#ministry_details').show()
                $('#ministry_name').text(data[0].ministry_name);
                $('#ministry_twitter').text(data[0].ministry_twitter_handle);
                $('#minister_head').text(data[0].ministry_head);
                $('#minister_twitter').text(data[0].ministry_head_handle);
                $('#ministry_website').text(data[0].ministry_website);
                $('#sector').text(data[0].sector_id);
                
            }

        })
})
})
  </script>
  @endsection