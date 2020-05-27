<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
      body {
      background-image: url('https://thumbs.dreamstime.com/b/dark-space-nebula-bright-stars-nebulae-like-cirrus-clouds-tones-slow-dolly-75426993.jpg');
    }
    .card-body{
      background-image: url('https://www.aimcobd.com/images/bg1.jpg');
    }
      .navbar{
        background-color: #16235A;
      /* background-image: url('https://www.elsetge.cat/myimg/f/1-12083_dark-hd-wallpapers-1080p-dark-wallpaper-1080p-background.jpg'); */
      }
    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link href="{{ asset('back-end/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" /> --}}
    <title>Home</title>
  </head>
  <body>

    @include('customer.navbar')

    <div class="container-fluid">
      <div class="container">
        <div class="row">
          @include('customer.message')
        </div>
      </div>
  
      <div class="row header-container justify-content-center">
        <div class="header">
            <h1>{{ Auth::user()->name }}</h1>
        </div>
      </div>
  
      @if ($layout == 'index')
      <div class="container-fluid mt-2">
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <section class="col-md-8">
                  <div class="card">
                    <div class="card-header"><h3>Search Your Ride</h3></div>
                    <div class="card-body">
                        <form action="{{ url('/home/enquiry')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="source">Source</label> --}}
                                <input name="source" id="source" type="text" class="form-control" placeholder="Enter Source Address" required>
                            </div>
                            <div class="form-group">
                                {{-- <label for="destination">Destination</label> --}}
                                <input name="destination" id="destination" type="text" class="form-control" placeholder="Enter destination Address" required>
                            </div>
                            <div class="form-group">
                                <label for="travel_date">Travel Date</label>
                                <input name="travel_date" id="travel_date" type="date" class="form-control" placeholder="Enter Travel Date" required>
                            </div>
                            <input type="submit" class="btn btn-info" value="Search"><strong>&nbsp; Or, &nbsp; </strong><a class="btn btn-primary a-btn-slide-text" href="{{ route('schedules.all') }}">Show All Schedules</a>
                          </form>
                    </div>
                </div>
                </section>
            </div>
        </div>
      </div>

      @elseif ($layout == 'schedules')
      <div class="container-fluid mt-2">
          <div class="row">
              <section class="col-md-7">
                  @include('customer.schedules')
                  {{-- {{ $schedules->links() }} --}}
              </section>
              <section class="col-md-5">
                  <div class="card mb-3">
                      <img src="https://www.elsetge.cat/myimg/f/0-7004_blog-post-image-silver-glitter-background-hd.jpg" class="card-img-top">
                      <div class="card-body">
                          <h5 class="card-title">Search For Another Bus</h5>
                          <form action="{{ url('/home/enquiry')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="source">Source</label>
                                <input name="source" value="{{ $source }}" id="source" type="text" class="form-control" placeholder="Enter Source Address">
                            </div>
                            <div class="form-group">
                                <label for="destination">Destination</label>
                                <input name="destination" value="{{ $dest }}" id="destination" type="text" class="form-control" placeholder="Enter destination Address">
                            </div>
                            <div class="form-group">
                                <label for="travel_date">Travel Date</label>
                                <input name="travel_date" value="{{ $date }}" id="travel_date" type="date" class="form-control" placeholder="Enter Travel Date">
                            </div>
                            <input type="submit" class="btn btn-info" value="Search">
                          </form>
                      </div>
                    </div>
              </section>
          </div>
      </div>

      @elseif ($layout == 'allSchedules')
      <div class="container-fluid mt-2">
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <section class="col-md-10">
                  @include('customer.schedules')
                  {{-- {{ $schedules->links() }} --}}
                </section>
            </div>
        </div>
      </div>

      @elseif ($layout == 'addBooking')
      <div class="container-fluid mt-2">
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <section class="col-md-8">
                  <div class="card">
                    <div class="card-header"><h3>Book Your Seat</h3></div>
                    <div class="card-body">
                        <form action="{{ url('/home/booking/'.$schedule->schedule_id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="customer_id">Customer Name </label>
                                  <input disabled name="customer_id" value="{{ ucfirst(Auth::user()->fname) }} {{ ucfirst(Auth::user()->lname) }}" type="text" class="form-control" placeholder="Enter Source Address" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="bus_id">Bus Name</label>
                                  <input disabled name="bus_id" value="{{ $bus->bus_name }}" type="text" class="form-control" placeholder="Enter Bus Name" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="customer_id">Seats</label>
                                  <div class="row">
                                      <?php
                                        for ($i=1; $i<=12 ; $i++) { ?>
                                        <div class="col-md-3">
                                              <input type="checkbox"  name="seats_booked[]" value="{{ $i }}" <?php 
                                                if(in_array("$i", (array)$seats)){echo "checked"; ?>
                                                 disabled="true" 
                                                 <?php }  ?>
                                                 >{{ $i }}
                                        </div>
                                      <?php } ?>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="bus_id">Price per Seat</label>
                                  <input readonly name="price" value="{{ $schedule->price }}" type="text" class="form-control" placeholder="Enter Bus Name" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="source">From</label>
                                  <input type="text" name="source" value="{{ $schedule->pickup_address }}" class="form-control" placeholder="Enter Source Address" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="source">To</label>
                                  <input type="text" name="destination" value="{{ $schedule->dropoff_address }}"  class="form-control" placeholder="Enter Destination Address" required>
                                </div>
                              </div>
                            </div>
                            <input type="submit" class="btn btn-info" value="Confirm"><strong>
                          </form>
                    </div>
                </div>
                </section>
            </div>
        </div>
      </div>

      @elseif ($layout == 'editBooking')
      <div class="container-fluid mt-2">
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <section class="col-md-8">
                  <div class="card">
                    <div class="card-header"><h3>Edit Ticket Info</h3></div>
                    <div class="card-body">
                        <form action="{{ url('/home/booking/'.$booking->booking_id).'/update' }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="customer_id">Customer Name </label>
                                  <input disabled name="customer_id" value="{{ ucfirst(Auth::user()->fname) }} {{ ucfirst(Auth::user()->lname) }}" type="text" class="form-control" placeholder="Enter Source Address" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="bus_id">Bus Name</label>
                                  <input disabled name="bus_id" value="{{ $bus->bus_name }}" type="text" class="form-control" placeholder="Enter Bus Name" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="customer_id">Seats</label>
                                  <div class="row">
                                      <?php
                                        for ($i=1; $i<=12 ; $i++) { ?>
                                        <div class="col-md-3">
                                              <input type="checkbox"  name="seats_booked[]" value="{{ $i }}" <?php
                                                 if(in_array("$i", (array)$bus->seats)){echo "checked"; ?> 
                                                 disabled="true"
                                                  <?php } if(in_array("$i", (array)$booking->seats_booked)){echo "checked"; } ?>
                                                  >{{ $i }}
                                        </div>
                                      <?php } ?>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="form-group">
                                    <label for="bus_id">Cost Per Seat</label>
                                    <input readonly name="price" value="{{ $schedule->price }}" type="text" class="form-control" required>
                                  </div> &nbsp; &nbsp;
                                  <div class="form-group">
                                    <label for="bus_id">Total</label>
                                    <input readonly name="total_price" value="{{ $booking->total_price }}" type="text" class="form-control" placeholder="Enter Bus Name" required>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="source">From</label>
                                  <input type="text" name="source" value="{{ $booking->source }}" class="form-control" placeholder="Enter Source Address" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="source">To</label>
                                  <input type="text" name="destination" value="{{ $booking->destination }}" class="form-control" placeholder="Enter Destination Address" required>
                                </div>
                              </div>
                            </div>

                            <input type="submit" class="btn btn-info" value="Confirm"><strong>
                          </form>
                    </div>
                </div>
                </section>
            </div>
        </div>
      </div>

      @elseif ($layout == 'checklist')
      <div class="container-fluid mt-2">
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <section class="col-md-10">
                  @include('customer.checklist')
                  {{-- {{ $schedules->links() }} --}}
                </section>
            </div>
        </div>
      </div>
  
      @elseif($layout == 'show')
      <div class="container-fluid mt-2">
          <div class="container-fluid mt-2">
              <div class="row justify-content-center">
                  <section class="col-md-8">
                      @include('blog.show')
                  </section>
              </div>
          </div>
      </div> 
  
      @elseif($layout == 'edit')
        <div class="container-fluid mt-2">
            <div class="row">
                <section class="col-md-7">
                    @include('blog.postlist')
                    {{ $posts->render() }}
                </section>
                <section class="col-md-5">
                    <div class="card mb-3">
                        <img src="/storage/images/{{$post->image}}" class="card-img-top" alt="Image">
                        <div class="card-body">
                          <h5 class="card-title">Update the information of the Post</h5>
                          <form action="{{ url('posts/'.$post->id)}}" method="post">
                            
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input value="{{$post->title}}" name="title" id="title" type="text" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <input value="{{$post->desc}}" name="desc" id="desc" type="text" class="form-control" placeholder="Enter Description">
                                </div>
                                <input type="file" class="btn btn-default" name="image" id="image">
                                <input type="submit" class="btn btn-info" value="Update">
                                <input type="hidden" name="_method" value="put" />  
                                <input type="submit" class="btn btn-warning" value="Reset">
                            </form>
                        </div>
                      </div>
                </section>
            </div>
        </div>
      @endif
      
    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
     <!--   Core JS Files   -->
    <script src="{{asset('back-end/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('back-end/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('back-end/assets/js/core/bootstrap-material-design.min.js')}}"></script>
     
  
  </body>
</html>