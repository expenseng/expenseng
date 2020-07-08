<!-------------Footer starts here-------------->
<footer class="my-footer">
  <div class="container">
      <div class="row">
          <div class="col-md-2 footer-brand ">
              <a href="{{ url('/') }}">
                  <img src="{{asset('images/Logo.svg')}}" class="ft">
              </a> <br><br>
              <a href=""><i class="fab fa-twitter" aria-hidden="true"></i><small> @expenseng</small></a>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-2 mt-3">
              <h6>Pages</h6>
              <ul >
                  <li>
                      <a  href="index.html"><small>Home</small></a>
                  </li>
                  <li>
                      <a  href="#"><small>Daily Report</small></a>
                  </li>
                  <li>
                      <a href="#"><small>Ministry Report</small></a>
                  </li>
                  <li>
                      <a href="#"><small>Company Report</small></a>
                  </li>
              </ul>

          </div>
          <div class=" mt-3 col-md-2">
              <h6>Profile</h6>
              <ul>
                  <li>
                      <a  href="ministry_list/ministry_list_federal_ministries.html"><small>Ministry Search</small></a>
                  </li>
                  <li>
                      <a href="/company/search"><small>Company Search</small></a>
                  </li>
              </ul>
          </div>
          <div class="col-md-2 mt-3">
              <h6>Reference</h6>
              <ul >
                  <li>
                      <a href="index.html"><small>Government handles</small></a>
                  </li>
                  <li>
                      <a href="{{ route('about') }}"><small>About us</small></a>
                  </li>
                  <li>
        <a href="{{ route('contact') }}"><small>Contact us</small></a>
      </li>
              </ul>
          </div>
      </div><br><br>
  </div>
  <div class="container-fluid lower">
    <div class="container">
        <div class="row ">
            <div class="col-md-9">
                <a href=""><small>Accessibility</small></a>-
                <a href=""><small> | Privacy Policy</small></a>-
                <a href=""><small> | Freedom of Information Act</small></a>
            </div>
            <div class="col-md-3">
                <a href=""><small><span>&#169</span>2020EXPENSENG.com</small></a>
            </div>
        </div>
    </div>
  </div>
</footer>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- custom script -->
<script src="{{ asset('js/app.js') }}"></script>