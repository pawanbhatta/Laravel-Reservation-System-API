<div class="modal fade" id="addStation" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Station</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('station.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <fieldset>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input name="name" class="form-control" aria-describedby="emailHelp"
                  placeholder="Enter Station Name" type="text">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input name="status" id="status" aria-describedby="emailHelp" type="checkbox">
                  <label for="status">Active</label>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Station</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  