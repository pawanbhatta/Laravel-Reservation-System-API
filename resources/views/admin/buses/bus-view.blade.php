<div class="modal fade" id="busView{{$bus->bus_id}}" tabindex="-1" role="dialog" 
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
                <img style="heigth:40px; width:40px; background-color:powderblue;" 
                src="/storage/bus_images/{{$bus->bus_image}}">
                <div class="card-body">                                             
                <h5 class="card-title">Name : {{$bus->bus_name}}</h5>
                <p class="card-text">Id : {{$bus->bus_id}}</p>
                <p class="card-text">Bus Number : {{$bus->bus_num}}</p>
                <p class="card-text">Contact Number : {{$bus->phone}}</p>
                <p class="card-text">Seats :
                <?php 
                  for ($i=1; $i<=12 ; $i++) { ?>
                  <input disabled="disabled" type="checkbox" name="seats[]" value="{{ $i }}" <?php if(in_array("$i", (array)$bus->seats)){echo "checked";}?>>{{ $i }}
                <?php } ?>
                </p>
                <p class="card-text">Status : @if($bus->status == 1)
                Available
              @else
                Not Available
              @endif</p>
              <hr>
              <p class="card-text"><small class="text-muted">Added on : {{$bus->created_at}}</small></p>
              <p class="card-text"><small class="text-muted">Updated on : {{$bus->updated_at}}</small></p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  