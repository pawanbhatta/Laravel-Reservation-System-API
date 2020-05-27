@extends('layouts.header')
@section('content') 
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addStation" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Station</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Station List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> These are all the stations for the routes.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($stations) > 0 ) 
                    <table class="col-md-12">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Station Name</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $stations as $key => $station )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$station->id}}"data-toggle="tooltip">{{ $station->name }}</a></td>
                        <td>{{ $station->updated_at }}</td>
                        <td>@if($station->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#stationView{{$station->id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
                  @include('admin.stations.station-view')
                          {{-- <a href="/admin/station/{{ $station->id }}/edit" class="btn btn-sm btn-info">Edit</a> --}}
                            <a href="#" data-toggle="modal" data-target="#editStation{{ $station->id }}" 
                              data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                              <i class="glyphicon glyphicon-eye"></i> Edit
                            </a>
                            @include('admin.stations.edit-station')
                          <form action="{{ url('/admin/station', ['id' => $station->id]) }}" method="post">
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
                {!! $stations->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.stations.add-station')
@endsection