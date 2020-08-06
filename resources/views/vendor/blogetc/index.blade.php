@extends("layouts.master",['title'=>$title])

@push('css')
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/dash-table.css') }}">

<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<style type="text/css">
    #main {
        margin: 1rem 0;
    }
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>
<title>FG Expense - Blog</title>
@endpush

@section("content")
    <!-- Main body start -->
    <div class="container">
        {{ Breadcrumbs::render('blog') }}

    <div class="row mb-4">
        <div class="col-md-5">
            <h6 class="para px-3">Read inside news from Ministries Agencies and Departments on topics, ranging from Economy, Finance, FG/MDAs Projects, Politics etc.</h6>
        </div>
        <div class="col-md-7">
            @include("blogetc::sitewide.show_categories")
        </div>
     </div>

    </div>

   

    <section id="main" class="">
        <div class="container">
            <div class="row ">  
                @if(isset($blogetc_category) && $blogetc_category)
                    <h2 class="text-center">
                        Viewing Category: {{$blogetc_category->category_name}}
                    </h2>
                    @if($blogetc_category->category_description)
                        <p class="text-center">{{$blogetc_category->category_description}}</p>
                    @endif
                @endif

                
                @forelse($posts as $post)
                   <div class="col-md-4"> @include("blogetc::partials.post_card") </div>
                @empty

                    <div class="alert alert-danger">No posts</div>
                @endforelse

                <div class="text-center col-sm-4 mx-auto">
                    {{$posts->appends( [] )->links()}}
                </div>
                @include("blogetc::sitewide.search_form")
            </div>
        </div>
    </section>
@endsection
