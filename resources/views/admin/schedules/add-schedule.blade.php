{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Schedule</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('bus-schedule.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customer_id">Stations</label>
                                    <div class="row">
                                    @foreach ($stations as $station)
                                        <div class="col-md-4">
                                            <input type="checkbox" name="stations[]" value="{{ $station->name }}">{{ $station->name }} <br>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="bus_id" id="bus_id" class="form-control">
                                        <option value="0" selected="true" disabled="true">Select Bus</option>
                                        @foreach ($buses as $bus)
                                            <option value="{{$bus->bus_id}}">{{$bus->bus_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                    <input name="price" rows="2" cols="20" class="form-control" 
                                    placeholder="Enter Price" type="number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <input name="status"  aria-describedby="emailHelp" type="checkbox">
                                      <label>Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depart_date">Depart Date</label>
                                    <input name="depart_date" id="depart_date"  class="form-control" aria-describedby="emailHelp"
                                    placeholder="Enter Depart Date" type="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depart_time">Depart Time</label>
                                    <input name="depart_time" id="depart_time" rows="2" cols="20" class="form-control" 
                                    placeholder="Enter Depart Time" type="time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_date">Return Date</label>
                                    <input name="return_date" id="return_date"  class="form-control" aria-describedby="emailHelp"
                                    placeholder="Enter Return Date" type="date">
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="return_time">Return Time</label>
                                        <input name="return_time" id="return_time" rows="2" cols="20" class="form-control" 
                                        placeholder="Enter Return Time" type="time">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                        <textarea name="pickup_address"  class="form-control" aria-describedby="emailHelp"
                                        placeholder="Enter Pickup Address" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                        <textarea name="dropoff_address" rows="2" cols="20" class="form-control" 
                                        placeholder="Enter Dropoff Address" type="text"></textarea>
                                    </div>
                                </div>
                            </div>
                      </fieldset>
                    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Schedule</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  @section('scripts')
  <script type="text/javascript">
    $(#'depart_date').datetimepicker({
        format:'YY-MM-DD'
    });
    $('return_date').datetimepicker({
        format:'YY-MM-DD'
    });
    $('.datepicker').datepicker()
  </script>
  @endsection