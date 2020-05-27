<div class="card mb-3">
    <img src="https://images3.alphacoders.com/823/thumb-1920-82317.jpg" height="300px" class="card-img-top">
    <div class="card-body">
      <h2 class="card-title">Bus Schedules</h2>
      <p class="card-text">Find Your Ride Here.</p>
        
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Bus Name</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Depart Date</th>
                <th scope="col">Depart Time</th>
                <th scope="col">Cost Per Seat</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr> 
            </thead>
            <tbody>
            @foreach ($schedules as $key => $schedule)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                @foreach ($buses as $bus)
                    @if ($bus->bus_id == $schedule->bus_id)
                        {{ $bus->bus_name }}
                    @endif
                @endforeach
                </td>
                <td>{{$schedule->pickup_address}}</td>
                <td>{{$schedule->dropoff_address}}</td>
                <td>{{$schedule->depart_date}}</td>
                <td>{{$schedule->depart_time}}</td>
                <td>{{ $schedule->price }}</td>
                <td>
                    @foreach ($buses as $bus)
                        @if ($bus->bus_id == $schedule->bus_id)
                            {{ $bus->phone }}
                        @endif
                    @endforeach
                </td>
                <td>
                    
                </td>
                <td>
                    <a href="{{ url('/home/booking/'.$schedule->schedule_id) }}" type="button" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-plus"></i>Book
                    </a>
                    
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('/home')}}" class="btn btn-primary a-btn-slide-text">
            <span aria-hidden="true">Manual Search</span>
        </a> 
    </div>
</div>


