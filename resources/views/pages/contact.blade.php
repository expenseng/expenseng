<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contacts-page.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <!-- Header -->

    <header>
        <div class="logo">
            <img src="img/Group 380.svg" class="logo1" alt="logo" srcset="">
            <img src="img/Frame 384.svg" class="logo2" alt="logo" srcset="">
        </div>  
        <a href="#"><i class="fa fa-2x fa-bars menu-toggle" id="menu" aria-hidden="true"></i></a>
        <ul class="nav " id="nav">
            <!-- <li><i class="hide-desktop fa fa-times exit-btn " id="exit" aria-hidden="true"></i></li> -->
            <li><a href="index.html"class="active">Home</a></li>
            <li><a href="#">Expenditure Report</a>
                <ul>
                    <li><a href="ExpenditureReport.html"class="">Daily Report</a></li>
                    <li><a href="companysearch.html"class="">Company Profile Search</a></li>
                    <li><a href="contact.html"class="">Contact</a></li>
                    <li><a href="quickContacts.html"class="">Quick Contacts</a></li>
                </ul>
            </li>
            <li><a href="#">Ministries</a>
                <ul>
                    <li><a href="#"class="">Home</a></li>
                    <li><a href="#"class="">Home</a></li>
                    <li><a href="#"class="">Home</a></li>
                    <li><a href="#"class="">Home</a></li>
                </ul>
            </li>
            <li><a href="#">Companies</a>
                <ul>
                    <li><a href="#"class="">Home</a></li>
                    <li><a href=""class="">Home</a></li>
                    <li><a href="#"class="">Home</a></li>
                    <li><a href="#"class="">Home</a></li>
                </ul>
            </li>
            <li><a href="#">About Us</a></li>
        </ul> 
    </header>     


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
                   <img src="img/Vector (2).png" alt="" style="margin-top: 0;"> <span>2972 Westheimer Rd. Santa Ana, Illinois 85486</span>
              </div>
             
              <div>  <img src="img/Vector (3).png" alt=""> <span>support.expenseng@gmail.com</span></div>
             
              <div><img src="img/Vector (4).png" alt=""> <span>(234) 555-0120 </span> </div> 
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
   <a href="#" class="ministry" >Looking for a Ministry you know? <span style="margin-left: 0; color: #00945E;">Check our Ministry Directory</span> </a>

</body>
</html>