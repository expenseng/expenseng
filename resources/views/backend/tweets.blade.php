{{--<table class="table  responsive-table centered ">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>id</th>--}}
{{--        <th>text</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
    @foreach ($tweets as $tweet)
        <div  class="tweet_div" id="{{$tweet->id}}">
            <div class="row">
            @isset($tweet->retweeted_status)
                <div class="col-lg-10 col-md-12 col-sm-12 ">
                    <div class="card bg-white p-0  m-1 ">
                        <div class="card-body">
                            <span class="text-primary p-0 m-0" style="font-size: 10px">Retweet</span>
                        <div class="row ">
                            <div class="col ">
                      <span class="text-dark">
                        {{$tweet->retweeted_status->text}}
                      </span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @else
                <div class = "col-lg-10 col-md-12 col-sm-12" >
            <div class="card bg-light p-4  m-1 ">
                <div class="row ">
                    <div class="col ">
                      <span class="text-dark">
                        {{$tweet->text}}
                      </span>
                    </div>
                </div>
            </div>
        </div>
        @endisset
                <div class="col-2 col-lg-2 col-md-12 col-sm-12 px-0">
                    <button class="button border rounded bth-block btn-danger shadow-lg p-4 m-1 tweetDelete" onclick='jQuery.fn.delete("{{$tweet->id}}")' value="{{$tweet->id}}">Delete</button>
                </div>
            </div>
        </div>
    @endforeach



