<div class="card mb-3">
  <img style="object-fit: scale-down; background-color:powderblue;" height="300px" width="100%" src="https://cdn.wallpapersafari.com/3/31/HvTZ3P.jpg">
  <div class="card-body">                                             
  <h5 class="card-title">WayToWay Travels</h5>
  <div class="row">
    <div class="col-md-6">
      <p class="card-text">Customer Name : {{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>
    </div>
    <div class="col-md-6">
      <p class="card-text">Bus Name : {{ $bus->bus_name }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="card-text">Customer Contact : {{ Auth::user()->phone }}</p>
    </div>
    <div class="col-md-6">
      <p class="card-text">Bus Contact : {{ $bus->phone }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="card-text">Seats : 
      @foreach ((array)($booking->seats_booked) as $seat)
          {{ $seat }}
      @endforeach
    </p>
    </div>
    <div class="col-md-6">
      <p class="card-text">Total Cost : {{ $booking->total_price }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="card-text">From : {{ $booking->source }}</p>
    </div>
    <div class="col-md-6">
      <p class="card-text">To : {{ $booking->destination }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p class="card-text">Bus Number : {{ $bus->bus_num }}</p>
    </div>
    <div class="col-md-6">
      <p class="card-text">Checked On : {{ $booking->created_at }}</p>
    </div>
  </div>
      <p class="card-text"><small class="text-muted">Added on {{$booking->created_at}}</small></p>
      <hr>
      <a href="{{ url('/home/booking')}}" class="btn btn-primary a-btn-slide-text">
          <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Back 
      </a>


      <a href="{{ url('/home/booking/'.$booking->booking_id) }}" type="button" class="btn btn-sm btn-primary">
        <i class="glyphicon glyphicon-plus"></i>View</a>
        <a href="/home/booking/{{ $booking->booking_id }}/edit" class="btn btn-sm btn-info">Edit</a>
        <form action="{{ url('/home/booking/', $booking->booking_id) }}" method="post">
          <input class="btn btn-sm btn-danger" type="submit" value="Delete" />
          <input type="hidden" name="_method" value="delete" />
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>


  </div>
</div>