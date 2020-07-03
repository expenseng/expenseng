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
        <div class="paragraph">
          <p>MINISTRIES AND AMOUNT SPENT</p>
          <hr>
        </div>
      </div>
    </div>


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
  </div>
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1500,
    });
  </script>


  <script src="assets/js/ministry_list.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  @endsection