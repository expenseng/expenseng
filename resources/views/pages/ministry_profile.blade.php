@extends('layouts.master')
@push('css')
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
        <a class="nav-link" id="home" href="#" style="color: #00945E;">Home <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item" id="dot"></li>
      
      
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

    <div class="text-left col-md-2">
    <img src="/images/nglogo2.png" id="ministry_logo" class="rounded" alt="fg logo">
    </div>

    <div id="ministry_name" class="p-2 col-md-4">
        <p >Ministry of Works And Human Development</p>
    </div>

</div>

<div class="mt-5 row">
  <div class="p-2 col-md-4">

      <div class="d-flex flex-column">
        <div class="p-2">Ministry Twitter Handle</div>
        <div class="p-2" id="handle">@ministryworks</div>
        <div class="p-2">2020</div>
      </div>

  </div>
  <div class="p-2 col-md-4">
     <div class="d-flex flex-column ">
        <div class="p-2">Total Amount Spent</div>
        <div class="p-2" id="color">#38.6M</div>
        <div class="p-2">2020</div>
      </div>
  </div>

  <div class="p-2 col-md-4">
     <div class="d-flex flex-column">
        <div class="p-2">Total Number of Projects Contracted</div>
        <div class="p-2" id="color">27</div>
        <div class="p-2">2020</div>
      </div>
  </div>

</div>

<div id="links" class="mt-5 row">
    <div class="col-md-4"><a href="#" class="active"><h4>Expense Summary</h4></a>
        <!--<div id="line"></div>-->
    </div>

    <div class="col-md-4"><a href="#"><h4>Cabinet</h4></a>
        <!--<div id="line"></div>-->
    </div>
</div>

<div class="mb-5 mt-3 row">
    <div class="col-md-8">
        <h5 id="charts">Charts</h5>
        @include('pages.ministry.ministry_profile_cabinet')
    

  </div>
    <!--end of chart-->
    <!--begin comments-->
    <div class="col-md-4">
        <h5 id="comments">Comments</h5>
        <div class="row">
            <div class="col-md-2">
              <img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics">
            </div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8">James Emmanuel</div>
                    <div class="col-md-4">2mins ago</div>
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
            <div class="col-md-2">...</div>
        </div>
        <!--end of comment-->

        <div class="row">
            <div class="col-md-2"><img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics"></div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8">James Emmanuel</div>
                    <div class="col-md-4">2mins ago</div>
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
            <div class="col-md-2">...</div>
        </div>

        <!--end of comment-->

        <div class="row">
            <div class="col-md-2"><img src="/images/min_comment_img/Rectangle 320.png" class="rounded" alt="profile pics"></div>
            <div class="col-md-8">
            <div class="d-flex flex-column">
                <div class="p-2 row">
                    <div class="col-md-8">James Emmanuel</div>
                    <div class="col-md-4">2mins ago</div>
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
            <div class="col-md-2">...</div>
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