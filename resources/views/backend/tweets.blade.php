{{--<table class="table  responsive-table centered ">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>id</th>--}}
{{--        <th>text</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
    @foreach ($tweets as $tweet)
        <div id="tweet{{$tweet->id}}">
            <div class="row">
            @isset($tweet->statusRt_id)
                <div class="col-lg-10 col-md-12 col-sm-12 ">
                    <div class="card bg-white p-4  m-1 ">
                        <div class="row ">
                            <div class="col ">
                      <span class="text-dark">
                        {{$tweet->statusRtText}}
                      </span>
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
                        {{$tweet->statusText}}
                      </span>
                    </div>
                </div>
            </div>
        </div>
        @endisset
                <div class="col-2 col-lg-2 col-md-12 col-sm-12 px-0">
                    <button class="button border rounded bth-block btn-danger shadow-lg p-4 m-1" id="tweetDelete" value="{{$tweet->id}}">Delete</button>
                </div>
            </div>
        </div>
    @endforeach
<div class="row align-items-center justify-content-center">
    <div class="col-3  m-aut0">
        {!! $tweets->render() !!}
    </div>
</div>

