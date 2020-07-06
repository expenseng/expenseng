@extends('layouts.html')
@section('css')
<link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/ministry_list_comment.css') }}">
<title>Ministry List Comment</title>
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="top">
                <a href=""><img src="/img/min_comment_img/HOME.png" alt="" class="img"></a>         
                <img src="/img/min_comment_img/Ellipse 60.png" alt="">
                <a href=""><img src="/img/min_comment_img//PROFILES.png" alt=""class="img"></a>
                <img src="../assets/img/min_comment_img/Ellipse 60.png" alt="">
                <a href=""><img src="../assets/img/min_comment_img//MINISTRIES.png" alt=""class="img"></a>
                <img src="/img/min_comment_img/Ellipse 60.png" alt="">
                <a href=""><img src="/img/min_comment_img/MINISTRY PROFILE.png" alt=""class="img"></a>
            </div> <br><br>
            <div class="coat">
                <img src="/img/min_comment_img/image 7.png" alt="">
                <h1>Ministry of Works and Human Development</h1>
            </div> <br> <br>
            <div class="twitter">
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <p class="topic"> Ministry Twitter Handle </p>
                        <div class="sub">
                            <p class="subtopic1">@ministryworks</p>
                            <p class="subtopic3">2020</p>
                        </div>
                      </div>
                      <div class="col-sm">
                        <p class="topic"> Total Amount Spent </p>
                        <div class="sub">
                            <p class="subtopic2">₦38.8 M</p>
                            <p class="subtopic3 closer">2020</p>
                        </div>
                      </div>
                      <div class="col-sm">
                        <p class="topic"> Total Number of Projects Contracted </p>
                        <div class="sub">
                            <p class="subtopic2">27</p>
                            <p class="subtopic3 closer">2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div> <br> <br>
            <div class="comm-section">
                
                <a href="ministry_list_tables.html">
                    <div>
                    <h5>Expense Summary</h5> 
                    <img src="/img/min_comment_img/Rectangle 453.png" class="hide" alt="">
                    </div>
                </a>
                
                <a href="ministryexpense.html">
                    <div>
                    <h5>Cabinet</h5> 
                    <img src="/img/min_comment_img/Rectangle 453.png" class="hide" alt="">
                    </div>
                </a>
                
                <a href="ministry_list_comment.html">
                    <div>
                    <h5 class="h51">Comments</h5> 
                    <img src="/img/min_comment_img/Rectangle 467.png" class="hide" alt="">
                    </div>
                </a>
               
            </div>
            <hr>
            <br> <br>
            <div class="comm">
                    <div class="comm-image">
                    <img src="/img/min_comment_img/Rectangle 320.png" alt="">
                    </div>
                    <div class="comm-writeup">
                    <p class="p1">James Emmanuel <span>2mins ago</span></p>
                    <h5>This is so nice to read, I can see the improvement in this sector,this is really encouraging. Kudos!!!</h5>
                    <p class="p2">
                        <span>
                           
                            <img src="/img/min_comment_img/Vector.png" alt=""> 23
                           
                        </span>
                        <span>
                            <img src="/img/min_comment_img/Vector(1).png" alt=""> 0
                        </span>
                        <span>
                            <img src="/img/min_comment_img/Vector(2).png" alt=""> Reply
                        </span>
                    </p>
                    </div>
                    <hr>
            </div> 
            <div class="shown">
                <img src="/img/min_comment_img/Rectangle 85(4).png" alt="">
            </div>
           
            <div class="hidden">
            <div class="comm">
                <div class="comm-image">
                <img src="/img/min_comment_img/Rectangle 320.png" alt="">
                </div>
                <div class="comm-writeup">
                <p class="p1">James Emmanuel <span>2mins ago</span></p>
                <h5>This is so nice to read, I can see the improvement in this sector,this is really encouraging. Kudos!!!</h5>
                <p class="p2">
                    <span>
                       
                        <img src="/img/min_comment_img/Vector.png" alt=""> 23
                       
                    </span>
                    <span>
                        <img src="/img/min_comment_img/Vector(1).png" alt=""> 0
                    </span>
                    <span>
                        <img src="/img/min_comment_img/(2).png" alt=""> Reply
                    </span>
                </p>
                </div> 
                
            </div> 
            
            <div class="comm inner-comm">
                <div class="comm-image">
                <img src="/img/min_comment_img/Rectangle 320.png" alt="">
                </div>
                <div class="comm-writeup">
                <p class="p1">James Emmanuel <span>2mins ago</span></p>
                <h5>This is so nice to read, I can see the improvement in this sector,this is really encouraging. Kudos!!!</h5>
                <p class="p2">
                    <span>
                       
                        <img src="/img/min_comment_img/Vector.png" alt=""> 23
                       
                    </span>
                    <span>
                        <img src="/img/min_comment_img/Vector(1).png" alt=""> 0
                    </span>
                    <span>
                        <img src="/img/min_comment_img/Vector(2).png" alt=""> Reply
                    </span>
                </p>
                </div> 
                
            </div> 
        </div>     
             <hr>
             <div class="input-comm">
             <input type="text" placeholder="Write a Comment"> 
             <img src="/img/min_comment_img/smile.png" alt="">
             <img src="/img/min_comment_img/image.png" alt="">
            </div>      
        </div>  
    </main>	
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection