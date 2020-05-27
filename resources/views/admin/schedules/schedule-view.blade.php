<div class="modal fade" id="scheduleView{{$schedule->schedule_id}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Schedule Details</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <div class="card-body">                                             
                <p class="card-text">Id : {{$schedule->schedule_id}}</p>
                    <p class="card-text">Pickup Address : {{$schedule->pickup_address}}</p>
                    <p class="card-text">Dropoff Address : {{$schedule->dropoff_address}}</p>
                    <p class="card-text">Depart Date : {{$schedule->depart_date}}</p>
                    <p class="card-text">Depart Time : {{$schedule->depart_time}}</p>
                    <p class="card-text">Return Date : {{$schedule->return_date}}</p>
                    <p class="card-text">Return Time : {{$schedule->return_time}}</p>
                    {{-- {{ $checkpoints = json_decode($schedule->stations) }} --}}
                    <p class="card-text">Checkpoints : </p>
                    @foreach ($schedule->stations as $key => $checkpoint)
                      ({{ $key+1 }}.)&nbsp;  {{ $checkpoint }}
                    @endforeach


                    <p class="card-text">Status : @if($schedule->status == 1)
                      Booked
                    @else
                      Pending...
                    @endif</p>
                    <hr>
                    <p class="card-text"><small class="text-muted">Booked on : {{$schedule->created_at}}</small></p>
                    <p class="card-text"><small class="text-muted">Updated on : {{$schedule->updated_at}}</small></p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  