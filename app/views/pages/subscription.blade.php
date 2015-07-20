 @extends('layouts.default')
 @section('content')
 <style type="text/css">

  #TextBoxesGroup{
    width: 600px;
  }
</style>
</head>
<br> <br> <br> 
 <?php $i=1;?>
<h3>My Subscriptions</h3>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  @foreach ( $eventInformation as $event)
  <div class="panel panel-default">

    <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">

      @if ($event['active'] == 1 ) 
      <input type="checkbox" class="EventActive" id="{{ $event['eventId']}}" checked data-toggle="toggle">
      @else
      <input type="checkbox" class="EventActive" id="{{ $event['eventId']}}" data-toggle="toggle">
      @endif


    </div>
    <div class="panel-heading" role="tab" id="Event{{ $event['eventId']}}"> 
      <h4 class="panel-title">
        <div class="glyphicon glyphicon-trash" style="cursor:pointer" onClick="$(this).delete({{ $event['subscriptionsId']}})"></div>
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $event['eventId']}}" aria-expanded="false" aria-controls="tabEvent{{ $event['eventId']}}">
          {{ $event['eventName']}}
        </a>
      </h4>
    </div>
    <div id="tabEvent{{ $event['eventId']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $event['eventId']}}">
      <div class="panel-body">
        <div style=" position: relative;float: right;">
          <button type="button" id="{{$event['eventId']}}" class="btn btn-success">Edit</button>
          
          
        </div>

        <div style="width: 535px;">
         
         <div id='TextBoxesGroup'>

         @foreach ( $event['urls']['callback_url'] as $value)

          <div id="TextBoxDiv{{$i}}" class="form-group">
            <div  class="input-group">
              <input type='text' class="form-control" value ='{{$value}}'  placeholder="Enter url" id='textbox{{$i}}' readonly >
              <span class="input-group-addon delete"  style="cursor:pointer; visibility:hidden; " id='{{$i++}}' >x</span>
            </div>

          </div>

        @endforeach
        </div>

      </div>
      <div class="glyphicon glyphicon-plus addEventUrl" style="cursor:pointer; display:block;" id="addButton" ></div>

      <br/>

    </div>


  </div>

</div>
</div>
@endforeach
</div>
@stop