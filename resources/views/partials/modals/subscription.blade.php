

@push('css')
<link rel="stylesheet" href="{{ asset('css/modal/style.css')}}">
@endpush

<script src="https://kit.fontawesome.com/9b1c8d52ed.js" crossorigin="anonymous"></script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
Subscribe
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <div class="row alignment">
        <div class="col-md-8">
          <h5>Subscribe to daily Reports</h5>

        </div>

      </div>
      </button>
    </div>

    <div class="modal-body">
        <div class="container">
            <div class="container-grid">
                <form method="POST" action="{{ url('/subscribe')}}">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name  "  required><br>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email"  required>

                    <br>
                    <select name="subscription_type" id="" class="form-control" required>
                        <option value="">Select The Report type</option>
                        <option value="ministry">Ministry</option>
                        <option value="contract">Contract</option>
                        <option value="daily&expense">Daily Expense</option>
                        <option value="payment">Payments Without description</option>
                    </select>
                    <br>
                    <button type="submit" style="float: right" class="btn btn-dark">Subscribe</button>
                </form>

        </div>
    </div>

  </div>
</div>
</div>
