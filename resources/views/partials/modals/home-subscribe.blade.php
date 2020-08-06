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
            <form id="subscribe-form" class="subscribe-form" method="POST" action="{{route('subscribe')}}">
                @csrf
                <div class="form-group">
                  <label for="full-name" class="col-form-label">Full Name:</label>
                  <input type="text" class="form-control" name='name' id="full-name" required />
                </div>
                <div class="form-group">
                  <label for="email-text" class="col-form-label">Email:</label>
                  <input type="email" name='email' class="form-control" id="email-text" required />
                </div>
                <input type="hidden" name="subscription_type" value="latest updates" required />
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light subscribe-button"
          onclick="event.preventDefault(); document.getElementById('subscribe-form').submit();">Subscribe</button>
        </div>
      </div>
    </div>
  </div>



<!-- Modal -->
<div class="modal fade" id="exampleModaltweets" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                            <div class="overflow-auto" style="max-height:300px; width: 100%">
                                <a class="twitter-timeline" data-theme="light" href="https://twitter.com/expenseng?ref_src=twsrc%5Etfw"  data-chrome="nofooter noheader noborders transparent">Tweets by expenseng</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
