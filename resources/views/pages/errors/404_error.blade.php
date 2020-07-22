<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="{{ asset('css/404_error.css')}}">
<title>404 error</title>
</head>

<body>
  <main class="main">
    <h1>Error: 404 Page Not found</h1>
    <div class="error">
        <b class="bold-text">4</b>
        <div class="imge"><img src="{{'/images/Group.png'}}" style="width:100%;height:100%" alt=""></div>
        <b class="bold-text">4</b>
    </div>
    <p class="message">Oops. The page you’re looking for does not exist</p>
  <a href="https://expenseng.com">  <button class="button">Back Home</button> </a>
</main>
  <!--
  <div class="error_body">./Group.png
    <h3>Error: 404 Page Not Found</h3>
    <div>
      <img src="{{'/images/Group1481.png'}}">
    </div>
    <h4>Oops. The page you looking for does not exist</h4>
    <a>Back Home</a>
  </div>-->

  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>