@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="/css/about%20us-header_footer.css">
<link rel="stylesheet" href="/css/ministry_list_table.css">
<title>FG Expense - Ministry List</title>
@endsection
    
@section('content')
<!-- Section-->
    <div class="container">
        <div class="row">
     <p id="header"> <span class="head-cont text-success"> HOME</span> <span class="head-cont"> &#8226</span> <span class="head-cont text-success"> PROFILES</span> <span class="head-cont"> &#8226</span> <span class="head-cont text-success"> MINISTRIES</span> <span class="head-cont"> &#8226</span> <span class="head-cont text-success"> MINISTRY PROFILE</span> </p>
     </div>
 </div>
    
    <div class="container intro">
        
         <div class="row">
    
        <h5 class="bio"> <img src="/img/image_7.png" width="70px"height="70px"> Ministry of Works and Human Development</h5>
       
      </div>
    <div class="row">
    <div class="col-md">
        <h5 class="cards"> Ministry Twitter Handle</h5>
        
        <div class="sub"><p id="minwrks"> @ministryworks</p>
        <p> 2020</p></div>
        

</div>    
        
        <div class="col-md">
        <h5 class="cards"> Total Amount Spent</h5>
        
       <div class="sub"> <p class="amount"> # 38.8M</p>
           <p> 2020</p> </div>
        

</div>    
        
           <div class="col-md">
        <h5 class="cards"> Total Number of Projects Contracted</h5>
        
        <div class="sub"><p class="amount"> 27</p>
            <p> 2020</p></div>
        

</div>      
        </div>
    </div>
    
    
    <div class="container-fluid btn-group"> <button class="button" id="first-btn">Expense Summary</button> <button  class="button btn-marg">Cabinet</button> <button class="button btn-marg">Comments</button></div>
    
  
   

        <div id="table-border"> 
    <div class="container">
        <div class="row">
            <div class="col">
        <h3 class="index"> Date:28th,May 2020</h1>
        </div>
            
            <div class="col">
            <button type="button" class="btn btn-success filter"> Select Date  <img src="/img/vector__2_.png"> </button>
            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="table-div">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Project</th>
            <th scope="col">Company</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        
        <tbody>
        <tr>
             <td> Rehabilitation of Lago..</td>
             <td> Julius Berger</td>
             <td> N72,902,001.229</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr class="back">
             <td> Rehabilitation of Lago..</td>
             <td> Samsung</td>
             <td> N65,001,901.123</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr>
             <td> Rehabilitation of Lago..</td>
             <td> CCNCC</td>
             <td> N62,899,012.111</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr class="back">
             <td> Building of Class Blocks</td>
             <td> HNG</td>
             <td> N56,901,889.101</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr>
             <td> Building of Class Blocks</td>
             <td> Huawei</td>
             <td> N72,902,001.229</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr class="back">
             <td> Building of Class Blocks</td>
             <td> MTN</td>
             <td> Amount</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr >
             <td> Building of Class Blocks</td>
             <td> Amount</td>
             <td> Amount</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr class="back">
             <td> Building of Class Blocks</td>
             <td> Amount</td>
             <td> Amount</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr>
             <td> Building of Class Blocks</td>
             <td> Amount</td>
             <td> Amount</td>
             <td> 20th, May 2020</td>
            </tr>
            <tr class="back">
             <td> Building of Class Blocks</td>
             <td> Amount</td>
             <td> Amount</td>
             <td> 20th, May 2020</td>
            </tr>
        </tbody>
        
        </table>
            </div>
        
        <div class="row">
        <div class="col-md result"> 1-20 of 320 results</div>
             <div class="col-md"> <div class="pagination">
  <a href="#">&laquo;</a>
  <a class="active" href="#">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">...</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div></div>
        
        </div>
    
    </div>
         
    </div>
    
    
    
    
      <div class="min-table-over">
    <div class="container">
        <div class="min-tab"> 
        <div class="row">
    <table class="minitable">
    <thead class="thead">
        <th class="first-th"> YEAR</th>
        <th> 2016 </th>
            <th class="minitable-inner"> 2017</th>
            <th> 2018</th>
            <th>2019</th>
            <th> 2020</th>
        </thead>
        
        <tbody>
        <tr>
            <td class="text-success"> TOTAL<br>AMOUNT </td>
                <td>16,456,352,000</td>
    
            <td class="minitable-inner">32,890,762,000</td>
            
            <td> 16,456,352,000</td>
            <td> 32,890,762,000</td>
             <td> 32,890,762,000</td>
</tr>
        </tbody>
    </table>

            </div>
            </div>
        <div class="row">
            <div class=" col-md min-pag-parent">1-20 of 320 results </div>
       <div class="col-md mini-pagination">     
  <a href="#">&laquo;</a>
  <a class="active" href="#">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">...</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
           </div>
</div>
        </div>
        </div>
    <br> <br> <br><br> 
    
<!--Section-->
@endsection
      
@section('js')
<script src="..assets/js/ministry_list.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection