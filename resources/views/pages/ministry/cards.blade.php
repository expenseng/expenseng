@if (count($ministries) >0)
@foreach($ministries as $ministry)
    <div data-id="{{$ministry->shortname}}" 
    class="col-lg-3 col-md-6 col-sm-12 ministry-cards d-flex" 
    style="cursor:pointer"
    >
    <div class="cont-1 d-flex flex-column justify-content-center py-0">
        <chart label="5-Year Trend" 
                v-bind:data="{{json_encode($ministry->chartData)}}" 
                element="{{ $ministry->shortname }}"></chart>
        <div class="img">
        <span class="circle"></span>
        </div>
        <div class="coat">
        <img src="{{ asset('images/image 7.png') }}" alt="">
        <div class="text-center ministry">
            <h4>{{$ministry->name}}</h4>
        </div>
        </div>
        <div class="texts d-flex flex-column text-center">
        <p>Total amount Spent</p>
        <p class="num">₦{{number_format($ministry->total,2)}}</p>
        <p class="year">{{date('Y')}}</p>
        </div>
    </div>
    <a title="Click to view profile" href="{{ route('ministries.single', $ministry->shortname) }}"></a>
    </div>
@endforeach
@else
    <p style="color:red"> Oops! No Ministry matches your search </p>
@endif

<div class="row centeri mzet-3 align-items-center">
    <span class="col-md result text-muted">{{ $ministries->firstItem() }} - {{ $ministries->lastItem() }} of {{ $ministries->total() }} results</span>
    {{ $ministries->links() }}
</div>