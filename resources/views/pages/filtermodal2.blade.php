<html>
    @extends('layouts.modal')
    @push('css')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</html>



<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group">
                <div class="bt-top">
                <label for="sort">View by</label> <br>
                <input type="submit" class="btn btn-info act" value="Day">      
                <input type="submit" class="btn btn-info " value="Month">
                <input type="submit" class="btn btn-info " value="Year">
                </div>
                <div class="container-fluid comm sel">
                <input type="email" class="form-control btn-block" id="email" placeholder="Select Date">  
                <img src="{{ asset('images/clarity_calendar-solid.png') }}" alt="" class="img-fluid">
                </div>    
            </div>
            <div class="bt-div">
                <label for="sort">Sort by</label> <br>
                <input type="submit" class="btn btn-info " value="Amount (Highest to Lowest)">      
                <input type="submit" class="btn btn-info nonactive" value="Amount (Lowest to Highest)">
            </div>
            <div class="app">
            <input type="submit" class="btn btn-info apply" value="Apply Filter">
            </div>
          </form>
        </div>
       {{--  <div class="modal-footer">
            <input type="submit" class="btn btn-info apply" value="Apply Filter">
        </div>
      </div> --}}
    </div>
  </div>
  @section('js')
  <script src="{{asset('js/modal.js')}}"></script>
  @endsection
</body>