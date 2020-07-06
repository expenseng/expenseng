@extends('layouts.master')
@push('css')

<link rel="stylesheet" href="{{asset('css/ministry_profile_table.css')}}" />
<link rel="stylesheet" href="{{asset('css/ministry_profile.css')}}" />
<link rel="stylesheet" href="{{asset('css/aboutus-header_footer.css')}}">
@endpush
<title> Expenseng - Minister profile' </title>

<!--content-->
@section('content')
<!-- nav bar-->
<nav class="navbar navbar-expand-lg navbar-light container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" id="home" href="#" style="color: #00945E;">
        Home <span class="sr-only">(current)</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="profile" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="ministries" href="">Ministries</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="ministry_prof" href="#">Ministry Profile</a>
      </li>
    </ul>
  </div>
</nav>

<!--end of navbar -->
<!--begin body -->
<section id="main" class="container">
<div class="row p-2 ">

    <div class="text-left col-md-1">
    <img src="/images/nglogo2.png" id="ministry_logo" class="rounded" alt="fg logo">
    </div>

    <div id="ministry_name" class=" col-md-7">
        <p >Ministry of Works And Human Development</p>
    </div>

</div>

<div class="mt-5 row">
  <div class="p-1 col-md-4">

      <div class="d-flex flex-column">
        <div class="p-2">Ministry Twitter Handle</div>
        <div class="p-2" id="handle">@ministryworks</div>
        <div class="p-2">2020</div>
      </div>

  </div>
  <div class="p-1 col-md-4">
     <div class="d-flex flex-column ">
        <div class="p-2">Total Amount Spent</div>
        <div class="p-2" id="color">#38.6M</div>
        <div class="p-2">2020</div>
      </div>
  </div>

  <div class="p-1 col-md-4">
     <div class="d-flex flex-column">
        <div class="p-2">Total Number of Projects Contracted</div>
        <div class="p-2" id="color">27</div>
        <div class="p-2">2020</div>
      </div>
  </div>

</div>

<div id="links" class="mt-5 row">
    <div class="col-md-4"><a href="#" class="active"><h4>Expense Summary</h4>
        <svg height="21" width="100">
          <line x1="200" y1="12" x2="0" y2="10" style="stroke: #00945E;stroke-width:2" />
        </svg>
    </a>
        <!--<div id="line"></div>-->
    </div>

    <div class="col-md-4"><a href="#"><h4>Cabinet </h4>
        <svg height="21" width="50">
          <line x1="200" y1="12" x2="0" y2="10" style="stroke:grey;stroke-width:2" />
        </svg>
    </a>
        <!--<div id="line"></div>-->
    </div>
</div>

<div class="mb-5 mt-3 row">
    <div class="col-md-8">
      <div class="mb-4 ">
        <h5 id="charts">Table <i class="fas fa-caret-down"></i>

        </h5>
      </div>
      
        
        @include('pages.ministry.ministry_profile_table')
    

  </div>
    <!--end of chart-->
    <!--begin comments-->
    <div class="col-md-4 ">
      <div class="mb-4">
        <h6 id="comments" >COMMENTS </h6>
        <svg height="15" width="25">
          <line x1="200" y1="12" x2="0" y2="10" style="stroke:#00945E;stroke-width:2" />
        </svg>
      </div>
        
        <div class="row mb-2" id="card">
            <div class="col-md-2">
              <img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics">
            </div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8 " id="comment_name">James Emmanuel</div>
                    <div class="col-md-4" id="time">2mins ago</div>
                </div>

                <div class="p-2">This is so nice to read. I can see improvement in this sector. 
                This is really encouraging!!!
            </div>

                <div class="p-2 row" >
                    <div class="col-md-3">
                        <img src="/images/min_comment_img/Vector.png" alt="like"/> 3
                    </div>
                    <div class="col-md-3">
                    <img src="/images/min_comment_img/Vector(1).png" alt="downvote" /> 0
                    </div>
                    <div class="col-md-6">
                    <img src="/images/min_comment_img/Vector(2).png" alt="reply"/> <d>Reply</d>
                    </div>

                </div>
            </div>
            </div>
            <div class="col-md-2 mt-1">...</div>
        </div>
        <!--end of comment-->

        <div class="row mb-2" id="card">
            <div class="col-md-2"><img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics"></div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8" id="comment_name">James Emmanuel</div>
                    <div class="col-md-4" id="time">2mins ago</div>
                </div>

                <div class="p-2">This is so nice to read. I can see improvement in this sector. 
                This is really encouraging!!!
            </div>

                <div class="p-2 row">
                    <div class="col-md-3">
                        <img src="/images/min_comment_img/Vector.png" alt="like"/> 3
                    </div>
                    <div class="col-md-3">
                    <img src="/images/min_comment_img/Vector(1).png" alt="downvote" /> 0
                    </div>
                    <div class="col-md-6">
                    <img src="/images/min_comment_img/Vector(2).png" alt="reply"/> <d>Reply</d>
                    </div>

                </div>
            </div>
            </div>
            <div class="col-md-2 mt-1">...</div>
        </div>

        <!--end of comment-->

        <div class="row mb-2" id="card">
            <div class="col-md-2"><img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics"></div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8" id="comment_name">James Emmanuel</div>
                    <div class="col-md-4" id="time">2mins ago</div>
                </div>

                <div class="p-2">This is so nice to read. I can see improvement in this sector. 
                This is really encouraging!!!
            </div>

                <div class="p-2 row">
                    <div class="col-md-3">
                        <img src="/images/min_comment_img/Vector.png" alt="like"/> 3
                    </div>
                    <div class="col-md-3">
                    <img src="/images/min_comment_img/Vector(1).png" alt="downvote" /> 0
                    </div>
                    <div class="col-md-6">
                    <img src="/images/min_comment_img/Vector(2).png" alt="reply"/> <d>Reply</d>
                    </div>

                </div>
            </div>
            </div>
            <div class="col-md-2 mt-1">...</div>
        </div>

        <!-- end of comment-->
        <div id="commentbox">
          <form>
            <div class="row">
              <div class="col-md-8 mt-2">
                <input type="text" class="form-control" id="validationCustom02" 
                placeholder="Write a comment" required />
                <!--<div class="valid-feedback">
                  Looks good!
                </div>-->
              </div>

              <div class="col-md-2 pt-2 pr-3">
                <img src="/images/min_comment_img/smile.png" alt="emoji"/>
              </div>

              <div class="col-md-2 p-2">
                <img src="/images/min_comment_img/image.png" alt="image"/>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
</section>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/expense-graph.js"></script>
<script src="/js/app.js"> </script>
@endsection