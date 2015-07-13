@extends('layouts.default')

@section('content')
<h3>Subscribe Event</h3>
@if (empty($Event) )
<br><br><br>
<div class="alert alert-info" id="noInformation">
  You subscribe all events
</div>
@else
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong> Event subscribed successfully.</strong>
</div>  
<div class="alert alert-danger">
  <strong id="Error"></strong> 
</div>
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
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>
      {{$name['description']}}
    </strong>
  </div>
  @endforeach

  <br/>
  <div id='TextBoxesGroup'>
    <div id="TextBoxDiv1" class="form-group">
      <div  class="input-group">
        <div class="input-group-addon check1" title=" Url validation">
          <span class="glyphicon glyphicon-minus" style='color:#eee' aria-hidden="true"></span>
        </div>
        <input type='text' class="form-control"  placeholder="Enter url" id='textbox1' >
        <a style="cursor:pointer" class="input-group-addon" id='1' >
          <span style="font-size: 18px;" title="Delete this field" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
  <div style="cursor:pointer; color:#337ab7" id='addButton' >
    <span style="font-size: 18px; margin-right: 8px;" class="glyphicon glyphicon-plus"></span>
    <strong style="font-size: 18px;">
      Add new Url
    </strong>
  </div>
  <br>
  <input type="button" id="subscribeButton" value="Subscribe event" class="btn btn-primary btn-lg btn-block"/>
</form>  
@endif
@stop