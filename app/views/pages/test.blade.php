@extends('layouts.default')

@section('content')

            <h3> Test Web-hooks </h3>
            <form>
                <div class="form-group">
                    <select class="form-control" id="selectFire">
                       <option value='null'>Select Event</option>
                       @for ($i = 0; $i < sizeof($Event); $i++)
                            <option value='{{$Event[$i]['id']}}'>{{$Event[$i]['name']}}</option>
                      @endfor
                    </select>
                </div>
                <div class="alert alert-info" id="eventUrls">
                    
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="payload" rows="5" placeholder="Enter payload"></textarea>
                </div>
                <button type="button"id="fireEvent" class="btn btn-primary btn-lg btn-block ">Fire event</button>
        </form>
@stop