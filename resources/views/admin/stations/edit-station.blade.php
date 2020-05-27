{{-- @include('layouts.app') --}}

<div class="modal fade" tabindex="-1" id="editStation{{ $station->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Update Station Info</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        {!! Form::open(['action' => ['StationController@update', $station->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input value="{{ $station->name }}" name="name" class="form-control" aria-describedby="emailHelp"
                            placeholder="Enter Station Name" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input value="{{$station->status}}" id="status" name="status"  aria-describedby="emailHelp" type="checkbox">
                        <label for="status">Available</label>
                    </div>
                </div>
            </div>
        </fieldset>
        </div>
        <div class="modal-footer">
            <a href="{{ route('station.index') }}" type="button" class="btn btn-sm btn-primary">Go Back</a>
        <button type="submit" class="btn btn-primary">Update Station</button>
        {{Form::hidden('_method','PUT')}}
        {!! Form::close() !!}
        </div>
    </div>
    </div>
</div>

