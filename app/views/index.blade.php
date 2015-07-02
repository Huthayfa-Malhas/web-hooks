<!DOCTYPE html>
<html lang="en" style="width: 700px; margin: 0 auto;">
<head>
<meta charset="UTF-8">
<title>Yamsafer webhooks</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script src="Ajax.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab li:eq(0) a").tab('show');
});
</script>
<style type="text/css">
   
</style>
  <img  src='images/Yamsafer_logo.png'/>
  <h1>WebHooks</h1>
</head>
<body>

<div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">

        <li><a data-toggle="tab" href="#Home">Home</a></li>
        <li><a data-toggle="tab" id="getEvents" href="#myEvents">My Events</a></li>
        <li><a data-toggle="tab" href="#subscribe">Subscribe Event</a></li>
        <li><a data-toggle="tab" href="#testwebhook">Test Web-Hooks</a></li>
    </ul>
    <div class="tab-content">
        <div id="Home" class="tab-pane fade in active">
           <h3> Yamsafer Web-hooks </h3>
            <div style="text-align:left"> 
               <p>Yamsafer.me ("The Traveller" in Arabic) is a rapidly-growing hotel booking site. We enable Arabs to easily find and book hotels, with or without a credit card.</p>
                <p> Yamsafer Webhooks allow you to build or set up integrations which subscribe to certain events on GitHub.com. When one of those events is triggered, we’ll send a HTTP POST payload to the webhook’s configured URL. Webhooks can be used to update an external issue tracker, trigger CI builds, update a backup mirror, or even deploy to your production server.</p>
            </div>        
        </div>

        <div id="myEvents" class="tab-pane fade">
            <h3>My Events</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   @for ($i = 0; $i < sizeof($Eventname); $i++)
                      <div class="panel panel-default">
                        <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">
                                @if ($Events[$i]['active'] == 1 ) 
                                <input type="checkbox" class="EventActive" id="{{ $Eventname[$i][0]['id']}}" checked data-toggle="toggle">
                                @else
                                <input type="checkbox" class="EventActive" id="{{ $Eventname[$i][0]['id']}}" data-toggle="toggle">
                                @endif

                        </div>
                        <div class="panel-heading" role="tab" id="Event{{ $Eventname[$i][0]['id']}}"> 
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $Eventname[$i][0]['id']}}" aria-expanded="false" aria-controls="tabEvent{{ $Eventname[$i][0]['id']}}">
                              {{ $Eventname[$i][0]['name']}}
                            </a>
                          </h4>
                        </div>
                        <div id="tabEvent{{ $Eventname[$i][0]['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $Eventname[$i][0]['id']}}">
                          <div class="panel-body">
                                <div style=" position: relative;float: right;">
                                    <button type="button" id='edit' class="btn btn-success">Edit</button>
                                    <input type="button" class="btn btn-danger" onClick="$(this).delete({{ $Eventname[$i][0]['id']}})" value="Delete">
                                </div>
                                @for ($j = 0; $j < count($Url[$i]) ; $j++ )
                                  {{ $Url[$i][$j]['callback_url']}}<br>
                                @endfor
                          </div>
                        </div>
                      </div>
                  @endfor
                </div>
        </div>
        
        <div id="subscribe" class="tab-pane fade">
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
adsasdasdasd
                <div id="textareaError" class="form-group">
                    <textarea class="form-control" id="UrlArea" rows="5" placeholder="Enter your URLs"></textarea>
                </div>
                <input type="button" id="subscribeButton" value="Subscribe event" class="btn btn-primary btn-lg btn-block"/>
            </form>            
        </div>
        <div id="testwebhook" class="tab-pane fade">
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
                
                <div class="form-group">
                    <textarea class="form-control" id="payload" rows="5" placeholder="Enter your URLs"></textarea>
                </div>
                <button type="button"id="fireEvent" class="btn btn-primary btn-lg btn-block">Fire event</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>                                     