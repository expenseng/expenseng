@php
    /** @var \WebDevEtc\BlogEtc\Models\Post $post */
@endphp
{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}


     <!-- Post card  -->

   
          <div class="card">
            <div class="img-fluid">  {!! $post->imageTag('medium', true, 'img-fluid') !!}</div>
              <div class="card-body">
                  <h2 class="card-title blog-title mt-2"><a href="{{$post->url()}}">{{$post->title}}</a></h2>
                  <h5>{{$post->subtitle}}</h5>
                    @if(config('blogetc.show_full_post_on_index'))
                        {!! $post->renderBody() !!}
                    @else
                        <p  class="blog-excerpt">{!! $post->generateIntroduction(180) !!}</p>
                    @endif
                  
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="{{ $post->url() }}" class="blog-read-more">Read More</a>
                  </div>
              </div>
          </div>


