@extends('layouts.header')
@section('content') 
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addBus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Bus</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Bus List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($buses) > 0 ) 
                    <table class="col-md-12">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Bus Name</th>
                    <th>Bus Number</th>
                    <th>Contact Number</th>
                    <th>Total Seats</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $buses as $key => $bus )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                        <img style="heigth:20px; width:20px; background-color:powderblue;" src="/storage/bus_images/{{$bus->bus_image}}">
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$bus->bus_id}}"data-toggle="tooltip">{{ $bus->bus_name }}</a></td>
                        <td>{{ $bus->bus_num }}</td>
                        <td>{{ $bus->phone }}</td> 
                        <td>{{ $bus->total_seats }}</td>
                        <td>{{ $bus->updated_at }}</td>
                        <td>@if($bus->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#busView{{$bus->bus_id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
                  @include('admin.buses.bus-view')
                          <a href="/admin/bus/{{ $bus->bus_id }}/edit" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{ url('/admin/bus', ['id' => $bus->bus_id]) }}" method="post">
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
                 </div>
                </div>
                {!! $buses->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.buses.add-bus')
@endsection