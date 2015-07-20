@extends('layouts.default')

@section('content')

            <center><h3> Test Web-hooks </h3></center>
            <form>
                <div class="form-group">
                    <select class="form-control" id="selectFire">
                       <option value='null'>Select Event</option>
                        @foreach ($events as $value)
                            <option value='{{$value->id}}'>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($eventUrls as $value)
                    <div class="alert alert-info urls" id='Urls{{$value['eventid']}}'>
                        @foreach ($value['urls'] as $key)
                            {{$key.'<br>'}}
                        @endforeach
                    </div>
                @endforeach
                <div class="form-group">
                    <textarea class="form-control" id="payload" rows="5" placeholder="Enter payload"></textarea>
                </div>
                <button type="button"id="fireEvent" class="btn btn-primary btn-lg btn-block ">Make event</button>
        </form>
@stop