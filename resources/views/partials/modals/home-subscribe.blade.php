<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light toggle" id="open" data-toggle="modal" data-target="#exampleModalCenter">
    Subscribe
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Subscribe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="subscribe-form">
                <div class="form-group">
                  <label for="full-name" class="col-form-label">Full Name:</label>
                  <input type="text" class="form-control" id="full-name">
                </div>
                <div class="form-group">
                  <label for="email-text" class="col-form-label">Email:</label>
                  <input type="email" class="form-control" id="email-text">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light subscribe-button">Subscribe</button>
        </div>
      </div>
    </div>
  </div>