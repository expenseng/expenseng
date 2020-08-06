@extends("layouts.master",['title'=>$post->genSeoTitle()])
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
    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}
    <div class="container">
        {{ Breadcrumbs::render('blog', $post) }}
    </div>
    <section id="main" class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    @include("blogetc::partials.show_errors")
                    @include("blogetc::partials.full_post_details")
                   <div class="row mt-4">     
                        <div class="col-md-12">
                             @include("blogetc::sitewide.recent_posts")
                        </div>
                   </div>
                    @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
                        <div class="mt-4">
                            <div id="maincommentscontainer">
                                <h4 class="text-center" id="blogetccomments">Comments</h4>
                                @include("blogetc::partials.show_comments")
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection