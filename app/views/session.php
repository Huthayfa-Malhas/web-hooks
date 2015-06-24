<!doctype html>
<html lang="en-US">
<link rel="stylesheet" type="text/css" media="all" href="mystyle.css">
 <link rel="stylesheet" type="text/js" media="all" href="myscript.js">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Yamsafer</title>
  <h1>Yamsafer WebHooks</h1>
</head>
<body>
  <header id="hero"></header>
  <div id="content">
 
    <div class="wrapper">
     
      
      <div id="jobs" class="clearfix">
        <div id="pages-list">
          <ul>
            <li><a href="#ref1" class="active">Yamsafer Hooks</a></li>
            <li><a href="#ref2">My Events</a></li>
            <li><a href="#ref3">Subscribe for event</a></li>
            <li><a href="#ref4">Test Webhooks</a></li>
           
          </ul>
        </div>
        
        <div id="firstpage">
          <div id="ref1" class="pageitem displayed">
            <h3> New to WebHook !!</h3>
          
           
          <p>Yamsafer.me ("The Traveller" in Arabic) is a rapidly-growing hotel booking site. We enable Arabs to easily find and book hotels, with or without a credit card.</p>
            
            <p> Yamsafer Webhooks allow you to build or set up integrations which subscribe to certain events on GitHub.com. When one of those events is triggered, we’ll send a HTTP POST payload to the webhook’s configured URL. Webhooks can be used to update an external issue tracker, trigger CI builds, update a backup mirror, or even deploy to your production server.</p>
        
          </div><!-- @end #job1 -->
<!-- @end #job1 -->

          <div id="ref2" class="pageitem">
         <p1>Event name and details</p1>    
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Genral View
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        You can here change the data and edit the event name 
      </div>
    </div>
  </div>
  <div class="panel panel-default template">
  <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
    <div class="panel-heading">
      <h4 class="panel-title">

        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Your First Event
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       
      </div>
    </div>
  </div>
</div>
<br />
<button class="btn btn-lg btn-primary btn-add-panel">
    <i class="glyphicon glyphicon-plus"></i> Add new panel
</button>
</div>
    



          

<div id="ref3" class="pageitem">
           <h3>Subscribe with Yamsafer Webhooks</h3>
<div class="container">
      <!-- freshdesignweb top bar -->
           
                
  
                  
      <div  class="form">


        <form id="contactform"> 

          <p class="contact"><label for="name"> Event Name</label></p> 
          <input id="name" name="name" placeholder="Please enter your event name" required="" tabindex="1" type="text" value=""> 
           <p class="contact"><label for="urls"> Urls</label></p> 
          <textarea rows="5" name="urls" class="no_bottom_margin" type="textarea"  value="" required=""></textarea>
            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Hook Event!" type="submit"  onClick="testResults(this.form)" >   
   </form> 
</div>      
</div>
  </div>


          <div id="ref4" class="pageitem">
                  
  <div class="container">
    <div class="dropdown">
      <select name="one" class="dropdown-select">
        <option value="">Select…</option>
        <option value="1">Option #1</option>
        <option value="2">Option #2</option>
        <option value="3">Option #3</option>
      </select>
    </div>
    
  
</div>


  
          <div  class="form">
        <form id="contactform"> 
      
           <p class="contact"><label for="payload"> Payload</label></p> 
          <textarea   rows="10" name="payload" class="no_bottom_margin" type="textarea1"  value="" ></textarea>
               
   </form> 
</div>      
          
            
           
          </div>     <!-- @end #job4 -->
          
       
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
$(function(){
  $pageslist = $('#pages-list ul li a');
  
  $($pageslist).on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');

    if(!$(this).hasClass('active')) {
      $('#pages-list ul li a.active').removeClass('active');
    }
    $(this).addClass('active');
    
    if(!$(newcontent).hasClass('displayed')) {
      $('.pageitem.displayed').removeClass('displayed');
      $(newcontent).addClass('displayed');
    }
  });
});

function testResults (form) {
    var Eventname = form.name.value;
 var EventUrl = form.urls.value;

    alert ("You typed: " + EventUrl + "You type: " + Eventname);
}


</script>
<script >
$(document).ready(function(){
  $("#demo").on("hide.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-down"></span> Open');
  });
  $("#demo").on("show.bs.collapse", function(){
    $(".btn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
  });
});



</script>
<script>

var $template = $(".template");

var hash =0;
var ev = "event"
$(".btn-add-panel").on("click", function () {
    var $newPanel = $template.clone();
    $newPanel.find(".collapse").removeClass("in");
    $newPanel.find(".accordion-toggle").attr("href",  "#" + (++hash))
             .text(ev);
    $newPanel.find(".panel-collapse").attr("id", hash).addClass("collapse").removeClass("in").text("ddssssss");
    $("#accordion").append($newPanel.fadeIn());
});

</script>

<script>
var select = document.getElementById("selectNumber"); 
var options = ["1", "2", "3", "4", "5"]; 

for(var i = 0; i < options.length; i++) {
    var opt = options[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select.appendChild(el);
}​
</script>




</body>
</html>



