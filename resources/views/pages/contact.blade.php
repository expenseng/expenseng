@extends('layouts.master')

@section('content')
<section class="main-section">
    <h2> Company Profile</h2>
</section>

  <section class="first">
     <h2>Contact us</h2>
     <p>Have any questions? We’d love to hear from you. Submit your queries here and we will get back to you as soon as possible..</p>
  </section>
  <section class="second">
      <h2>Send Us a Message</h2>
      <div class="container">
          <div class="details">
              <div>
              <img src="{{ asset('img/Vector (2).png') }}" alt="" style="margin-top: 0;"> <span>2972 Westheimer Rd. Santa Ana, Illinois 85486</span>
              </div>

              <div>  <img src="{{ asset('img/Vector (3).png') }}" alt=""> <span>support.expenseng@gmail.com</span></div>

              <div><img src="{{ asset('img/Vector (4).png') }}" alt=""> <span>(234) 555-0120 </span> </div>
          </div>

          <form >
           <label >
               <input type="text" placeholder="Name" style="margin-top: 0;">
           </label>
           <label >
            <input type="text" placeholder="Email" id="">
        </label>
        <label >
          <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
        </label>
          <button>Submit</button>
          </form>
      </div>
  </section>
   <a href="#" class="ministry">Looking for a Ministry you know? <span style="margin-left: 0; color: #00945E;">Check our Ministry Directory</span> </a>

@endsection
