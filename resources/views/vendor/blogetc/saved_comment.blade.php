@extends("layouts.master")

@push('css')
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/dash-table.css') }}">

<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">

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

    </div>
      <section id="main" class="">
        <div class="container">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="text-center">
                        <h3>
                            Thanks! Your comment has been saved!
                        </h3>

                        @if(!config('blogetc.comments.auto_approve_comments', false))
                            <p>
                                After an admin user approves the comment, it'll appear on the site!
                            </p>
                        @endif

                        <a href="{{ $blog_post->url() }}" class="btn btn-primary">
                            Back to blog post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

