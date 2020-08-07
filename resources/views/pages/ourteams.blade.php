@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/ourteams.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

  <title>FG Expense - TEAM</title>
@endpush


@section('content')
    <div class="container ourteam">
      {{ Breadcrumbs::render('teams') }}
      <div class="heading-cont"><h1 class="heading">Our Team</h1>
      <p class="heading-text">ExpenseNG.com wouldn't have been possible without a set of dedicated Engineers and Project manager. Meet our team listed below with their position and quick contacts.</p>
     
      </div>
    <div class="teamimg-cont row">
      @if (count($team) >0)
          @foreach ($team as $team)
            
              <div class="col-md-3 mb-5">
                <div class="team-frame">
                  <img src="{{$team->avatar}}" alt="" class="img-fluid team-img">
                  <h2 class="team-name">{{$team->name}}</h2>
                  <p class="team-role">{{$team->role}}</p>
                   
                  <div class="social-icons">
                    <a href="https://facebook.com/{{$team->facebook_handle}}"><img src="{{ asset('/images/facebook-circle.svg') }}" alt="" class="team-fb"></a>
                    <a href="https://twitter.com/{{$team->twitter_handle}}"><img src="{{ asset('/images/twitter-circle.svg') }}" alt="" class="team-twitter"></a>
                    <a href="https://linkedin.com/in/{{$team->linkedIn_handle}}"><img src="{{ asset('/images/linkedin-circle.svg') }}" alt="" class="team-linkedin"></a>
                    <a href="https://instagram.com/{{$team->instagram}}"><img src="{{ asset('/images/insta-circle.svg') }}" alt="" class="team-insta"></a>
                  </div>
                </div>
              </div>
              
        @endforeach
      @else
          <tr><td></td><td style="color:red">No team data available for this period<td><td></td></tr>  
      @endif
      </div>
    </div>    

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="{{asset('/js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

