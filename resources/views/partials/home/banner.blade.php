<div class="mx-lg-4">
    <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px" >
      <div class="background ">
        <div class="banner">
          <div class="carets" id="caret">
            <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left">
            <img src="{{asset('images/angle-right.svg')}}" alt="" class="arrow-right">
          </div>
          <div class="target">
            <div class="summary col-md-7 col-sm-9">
                <h4 class="slightly-bold"> In 2019,<br> the government spent </h4>
                <h4 class="bolding"> &#8358;8.92 trillion.</h4>
                <div class="para">
                  <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across Nigeria.
                    Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
                </div>
            </div>
            <div class="gallery p-3 slick"  data-flickity='{ "freeScroll": true }'>
              @foreach ($expenses as $expense)
                <div class="card1 carousel-cell card">
                    <p class="tag">New</p>
                  <div class="project">
                    <p class="slightly-bold">{{ $expense->description }}</p>
                      <div class="d-flex justify-content-between mt-2 align-items-center">
                          <p class="slightly-bold">AMOUNT: </p>
                          <p id="cost">₦{{ number_format($expense->amount, 2) }}</p>
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>


          <button class="btn scroll-down" >
            <a href="#expenses"></a>
          </button>
        </div>
      </div>
    </div>
</div>