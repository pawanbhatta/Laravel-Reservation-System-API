<div class="modal fade" id="stationView{{$station->id}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Bus Details</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <div class="card-body">                                             
                <h5 class="card-title">Name : {{$station->name}}</h5>
              <p class="card-text">Status : @if($station->status == 1)
                Available
              @else
                Not Available
              @endif</p>
              <hr>
              <p class="card-text"><small class="text-muted">Added on : {{$station->created_at}}</small></p>
              <p class="card-text"><small class="text-muted">Updated on : {{$station->updated_at}}</small></p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  