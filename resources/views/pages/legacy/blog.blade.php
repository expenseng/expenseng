@extends('layouts.master')
@section('css')
  <title>FG Expense - Home</title>
  <link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

@endsection

@section('content')
    <section  class="container-fluid">
        <div class="section-content">
            <h1>FG Expense Blog</h1>
            <p>FG Blogging Page, Read Wide About Our Expense</p>
        </div>
        <h2 class="latest">Latest News</h2>
        <div class="wall">
            <div class="wall-item">
               <img src="{{ asset('images/gov1.png')}}" alt="">
               <h2>The Corporate Insolvency and Governance Act</h2>
               <p>The Corporate Insolvency and Governance Act:
                    Relieving the burden on businesses during the coronavirus outbreak</p>
            </div>

            <div class="wall-item">
                <img src="{{ asset('images/gov2.png') }}" alt="">
                <h2>User research panel: help us to help you</h2>
                <p>My role is to represent the user. I help service teams to
                    learn about our users so that Companies House can design,
                    create and deliver services that meet user needs.</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov3.png') }}" alt="">
                <h2>Hiring employees: a step by step guide</h2>
                <p>You’re running a business on your own, and it’s going well.
                    Almost too well in fact – you need extra hands! But how do you go about hiring,
                    making sure you stay on the right side of employment law?</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov4.png') }}" alt="">
                <h2>Choosing technology that is “at least as good as people have at home”</h2>
                <p>We have now deployed the new technology services to more than 2,200 users across the Cabinet Office,
                    the Department for Culture,
                     Media and Sport and Crown Commercial Service, with another 800 or so still to come.</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov5png') }}" alt="">
                <h2>How designers across government are working remotely</h2>
                <p>Designers in government work in collaborative ways,
                    closely connected with peers in policy, digital, and delivery teams. Now,
                    as people are asked to work from home, designers have adapted to the new circumstances,
                    altered their ways of working and adopted new tools.</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov6.png') }}" alt="">
                <h2>What is the geospatial data market, and where can I find it?</h2>
                <p>From the parcel ordered and delivered to you on the same day,
                     to the morning traffic alert that diverts you along a quicker driving route,
                      geospatial data is increasingly powering the way we go about our daily lives.
                       As the number of goods and services underpinned by geospatial data continues to grow, the Geospatial Commission
                    will be working with Frontier Economics to look at the features and dynamics of this ‘geospatial data market’</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov7.png') }}" alt="">
                <h2>Government Security Conference and Awards 2020</h2>
                <p>Last week, Government Security was proud to hold it's annual
                    cross government conference and awards ceremony at The Mermaid, City of London</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov8.png') }}" alt="">
                <h2>Government Security Profession career framework unveiled</h2>
                <p>Government Security is one of the newest functions in government.
                    Daljinder Mattu, Head of Engagement for the Government Security
                    Profession shares information about how you can find out more about
                    developing your career as part of a brilliant Civil Service...</p>
             </div>

             <div class="wall-item">
                <img src="{{ asset('images/gov9.png') }}" alt="">
                <h2>Introducing the cross-government user research ethics network</h2>
                <p>In Spring 2019, we decided to kick off a cross-government user
                    research ethics network by running a meetup in London.</p>
             </div>
        </div>
    </section>


@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
