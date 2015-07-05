@extends('layouts.default')

@section('content')
    <h3>Subscribe Event</h3>
            <form>
                <div id="eventError" class="form-group">
                    <select class="form-control" id="eventSelected">
                      <option value='null'>Select Event</option>
                      @for ($i = 0; $i < sizeof($Event); $i++)
                          <option value='{{$Event[$i]['id']}}'>{{$Event[$i]['name']}}</option>
                      @endfor
                    </select>

                </div>
                <div class="alert alert-info" id="eventDescription">
                  
                </div>
                <div id="textareaError" class="form-group">
                    <textarea class="form-control" id="UrlArea" rows="5" placeholder="Enter your URLs"></textarea>
                </div>
                <input type="button" id="subscribeButton" value="Subscribe event" class="btn btn-primary btn-lg btn-block"/>
            </form>  
@stop