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
        <li><a data-toggle="tab" href="#myEvents">My Events</a></li>
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
                  <div class="panel panel-default">
                    <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">
                            <input type="checkbox" checked  data-toggle="toggle">
                        </div>
                    <div class="panel-heading" role="tab" id="headingOne"> 
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Collapsible Group Item #1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                            <div style=" position: relative;float: right;">
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        www.google.com <br/>
                        www.facebook.com <br/>
                        www.instagram.com <br/>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Collapsible Group Item #2
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                         <div style=" position: relative;
                                    float: right;">
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Collapsible Group Item #3
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        
        <div id="subscribe" class="tab-pane fade">
            <h3>Subscribe Event</h3>
            <form>
                <div id="eventError" class="form-group">
                    <input type="text" class="form-control" id="EventName" placeholder="Event name">
                </div>
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
                    <select class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                </div>
                <p class="bg-info">
                    www.google.com<br>
                    www.facebook.com<br>
                </p>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Enter your URLs"></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>                                     