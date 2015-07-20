@extends('layouts.default')

@section('content')
    <center><h3>Subscribe Event</h3></center>
            <form>
                <div id="eventError" class="form-group">
                    <select class="form-control" id="eventSelected">
                      <option value='null'>Select Event</option>
                      @foreach($Event as $name)
                          <option value='{{$name['id']}}'>{{$name['name']}}</option>
                      @endforeach
                    </select>

                </div>
                  @foreach($Event as $name)
                      <div class="alert alert-info" id="{{$name['id']}}">
                          {{$name['description']}}
                      </div>
                  @endforeach
                  
                <div id="textareaError" class="form-group">
                    <textarea class="form-control" id="UrlArea" rows="5" placeholder="Enter your URLs"></textarea>
                </div>
                <input type="button" id="subscribeButton" value="Subscribe event" class="btn btn-primary btn-lg btn-block"/>
            </form>  
@stop