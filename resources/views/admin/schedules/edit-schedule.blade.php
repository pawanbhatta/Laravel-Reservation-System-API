@include('layouts.app')
@include('admin.message')

<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h2 class="modal-title" id="exampleModalLongTitle" align="center">
        <i class="glyphicon glyphicon-log-in">Update Schedule</i></h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">



    {!! Form::open(['action' => ['BusScheduleController@update', $schedule->schedule_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    {{ csrf_field() }}
    <fieldset>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="customer_id">Stations</label>
                    <div class="row">
                        <?php
                        // for ($i=1; $i<=count($stations) ; $i++) { ?>
                        @foreach ($stations as $station)
                            <div class="col-md-4">
                                <input type="checkbox"  name="stations[]" value="{{ $station->name }}" <?php if(in_array("$station->name", (array)$schedule->stations)){echo "checked";  } ?>>{{ $station->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <!-- <label for="exampleInputPassword1">Seat No</label> -->
                        <select name="bus_id" class="form-control">
                            <option value="">Select Bus</option>
                            @foreach ($buses as $bus)
                            <option value="{{$bus->bus_id}}">{{$bus->bus_name}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price </label>
                    <input type="text" name="price" id="price" value="{{ $schedule->price }}">
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="depart_date">Depart Date</label>
                    <input name="depart_date" id="depart_date" value="{{ $schedule->depart_date }}" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Depart Date" type="date">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="depart_time">Depart Time</label>
                    <input name="depart_time" id="depart_time" value="{{ $schedule->depart_time }}" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Depart Time" type="time">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input name="return_date" id="return_date" value="{{ $schedule->return_date }}"  class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Return Date" type="date">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="return_time">Return Time</label>
                    <input name="return_time" id="return_time" value="{{ $schedule->return_time }}" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Return Time" type="time">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                    <input name="pickup_address" value="{{ $schedule->pickup_address }}" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Pickup Address" type="text">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Seat No</label> -->
                    <input name="dropoff_address" value="{{ $schedule->dropoff_address }}" class="form-control" 
                    placeholder="Enter Dropoff Address" type="text">
                </div>
                </div>
            </div>
          <div class="col-md-3">
          <div class="form-group">
                <input name="status" value="{{ $schedule->status }}" aria-describedby="emailHelp" type="checkbox">
                <label>Book</label>
          </div>
          </div>

      </fieldset>
    </div>
    <div class="modal-footer">
    <a href="{{ url('/admin/bus-schedule') }}" type="button" class="btn btn-sm btn-primary">Go Back</a>
    <button type="submit" class="btn btn-primary">Update Schedule</button>
    {{Form::hidden('_method','PUT')}}
    {{-- {{Form::submit('submit', ['class' => 'btn btn-primary'])}} --}}
    {!! Form::close() !!}
    </div>
</div>
</div>