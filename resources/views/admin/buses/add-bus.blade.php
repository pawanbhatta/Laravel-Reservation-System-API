<div class="modal fade" id="addBus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('bus.store') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_name" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Name" type="text">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_num" class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Number" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="seats_booked">Seats : </label><br>
                              <div class="row">
                                <?php for ($i=1; $i <= 12; $i++) { ?>
                                  <div class="col-md-3">
                                    <input type="checkbox" id="seats" name="seats[]" value="{{ $i }}">{{ $i }} <br>
                                  </div>
                                <?php  } ?>
                                <div class="col-md-3">
                                  <input type="checkbox" id="select-all">
                                  <label for="select-all">Select All</label>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="phone" class="form-control" aria-describedby="emailHelp"
                             placeholder="Enter Phone Number" type="text">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="total_seats"  class="form-control" aria-describedby="emailHelp"
                             placeholder="Enter Total Seat" type="number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="status" id="status" aria-describedby="emailHelp" type="checkbox">
                            <label for="status">Available</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="control-label">Image</label>
                          <input type="file" name="bus_image">
                        </div>
                      </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[id="seats"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
 </script>