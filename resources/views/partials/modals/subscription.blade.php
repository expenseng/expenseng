

@push('css')
<link rel="stylesheet" href="{{ asset('css/modal/style.css')}}">
@endpush

<button type="button" class="btn btn-outline-light btn-subscribe" data-toggle="modal" data-target="#exampleModalCenter">
Subscribe
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Subscribe to Daily Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="container-grid">
            <form method="post" action="{{ action('SubscriptionController@store')}}">
              {{csrf_field()}}
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
</div>
