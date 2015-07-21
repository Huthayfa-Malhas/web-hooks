 @extends('layouts.default')
 @section('content')
<<<<<<< HEAD
 <h3>My Subscriptions</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                 @if (empty($eventInformation))
                    <div class="alert alert-info" id ="noInformation">
                      You don't have any subscriptions yet
                    </div>
                 @else
                    @foreach ( $eventInformation as $event)
                        <div class="panel panel-default">
                          <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">
                                  @if ($event['active'] == 1 ) 
                                  <input type="checkbox" class="EventActive" id="{{ $event['subscriptionsId']}}" checked data-toggle="toggle">
                                  @else
                                  <input type="checkbox" class="EventActive" id="{{ $event['subscriptionsId']}}" data-toggle="toggle">
                                  @endif

                          </div>
                          <div class="panel-heading" role="tab" id="Event{{ $event['eventId']}}"> 
                            <h4 class="panel-title">
                            <div class="glyphicon glyphicon-trash" style="cursor:pointer" onClick="if(confirm('Are you sure you want to unsubscribe this event?')){$(this).delete({{ $event['subscriptionsId']}})}" titel="Delete"></div>
                             &nbsp;
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $event['eventId']}}" aria-expanded="false" aria-controls="tabEvent{{ $event['eventId']}}">
                               <strong> {{ $event['eventName']}}</strong>
                              </a>
                            </h4>
                          </div>
                          <div id="tabEvent{{ $event['eventId']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $event['eventId']}}">
                            <div class="panel-body">
                                  <div style=" position: relative;float: right;">
                                    <div class="glyphicon glyphicon-pencil" style="cursor:pointer;font-size:18px" id="{{$event['subscriptionsId']}}"></div>
                                  </div>
                                  <div style="width: 535px;">
                                      <div class='divtotext' style='padding:4px 4px 1px 14px' id="divtotext{{$event['subscriptionsId']}}" contenteditable='false'>
                                          @foreach ( $event['urls'] as $value)
                                          {{  $value['callback_url'].'<br>' }}
                                          @endforeach
                                      </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    @endforeach  
                  @endif
              </div>
              @stop

=======
 <style type="text/css">

  #TextBoxesGroup{
    width: 600px;
  }
</style>

</head>
<br> <br> <br> 
<script type="text/javascript">

  $(document).ready(function(){


    $(document).on('click',".input-group-addon", (function () {
      var value = $("#textbox" + $(this).attr('id')).val()
      if(!isEmpty(value)){
        var confirmation = confirm("Are you sure you want to delete this textbox?");
        if (confirmation == true)
        {
          $("#TextBoxDiv" + $(this).attr('id')).remove();

         console.log($(this).attr('id'));
       } else {
        return; 
      }
    }else {
      $("#TextBoxDiv"+$(this).attr('id')).remove();
    }
  }))





    $(document).on('click','#getUrl',function(){
      var Url = []
      $(".form-control").each(function() {
        var urlBody = $(this).val();
        var Id= "#TextBoxDiv"+ ($(this).attr('id')).slice(-1);
        if(validateURL(urlBody)){
          $(Id).removeClass('form-group has-error').addClass('form-group has-success')
          Url.push(urlBody);
        } else
        $(Id).removeClass('form-group has-success').addClass('form-group has-error')
      });
      console.log(Url)
    });


    
    $(document).on('click','.addEventUrl', function () {
      console.log("clicked!");
      var addButton = $(this);
      var counter = 2;
      var newTextBoxDiv = $(document.createElement('div'))
      .attr("class", 'form-control' + counter);
      addButton.after(
        '<input type="text" class="form-control"  name="textbox' + counter + 
        '" id="textbox" value="" placeholder="Enter url"  /> <br/>' );




      counter++;

    });



  }); 
</script>

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
         <div class="glyphicon glyphicon-plus addEventUrl" style="cursor:pointer; display:block;" id="addButton"></div>
         <?php $i=1;?>
         @foreach ( $event['urls']['callback_url'] as $value)

         <div id='TextBoxesGroup' class=>
          <div id="TextBoxDiv1" class="form-group">
            <div  class="input-group">
              <input type='text' class="form-control" value ='{{$value}}'  placeholder="Enter url" id='textbox{{$i++}}' readonly >
              <span class="input-group-addon" id='1' >x</span>

            </div>

          </div>
        </div>
        @endforeach

      </div>

      <br/>

    </div>


  </div>

</div>
</div>
@endforeach
</div>
@stop
>>>>>>> 9ec1550cee89810d355d28334cc2ae83b9a9b602
