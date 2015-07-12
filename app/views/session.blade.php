<!doctype html>
<html lang="en-US">
  <link rel="stylesheet" type="text/css" media="all" href="/mystyle.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Yamsafer</title>
    <h1>Yamsafer WebHooks</h1>
  </head>
  <body>
    {{json_decode(serialize($sentnames))}}
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
              
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  
                  
                </div>
                
                <?php  for ($i = 0; $i < sizeof($sentnames); $i++) {
                ?>
                <div class="panel panel-default template">
                  
                  <div class="panel-heading">
                    <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $sentnames[$i]['name']; ?>">
                      {{ $sentnames[$i]['name'] }}
                    </a>

               <?php    if (  $sentnames[$i]['active'] == 1){ ?>
                  <input type="checkbox" data-toggle="toggle"  checked> 
                      <?php }?>

                   <?php    if (  $sentnames[$i]['active'] == 0){ ?>
                  <input type="checkbox" data-toggle="toggle"  > 
                      <?php }?>                    
                    </h4>
                  </div>
                  <div id="<?php echo $sentnames[$i]['name']; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                    </div>
                    <?php $theurls = $sentnames[$i]->urls->toArray() ?>
                    <?php  for ($j=0;$j<sizeof($theurls);$j++)
                    { 
                      ?>
                    {{ $theurls[$j]['callback_url'] }}
                      <br/>
                      <?php }?>

                  </div>
                  
                </div>
                <?php }?>
              </div>
              <br />
              
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
                    <?php  for ($i = 0; $i < sizeof($sentnames); $i++) {
                    ?>
                    <option value=1><?php echo $sentnames[$i]['name']; ?></option>
                    };
                    <?php }?>
                  </select>
                </div>
                
                
              </div>
              
              <div  class="form">
                <form id="contactform">
                  
                  <p class="contact"><label for="payload"> Payload</label></p>
                  <textarea   rows="10" name="payload" class="no_bottom_margin" type="textarea1"  value="" ></textarea>
                  
                </form>
              </div>
              
              
              
              </div>     <!-- @end #page4 -->
              
              
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
      <script>
      var $template = $(".template");
      var hash = 0;
      $(".btn-add-panel").on("click", function () {
      var $newPanel = $template.clone();
      $newPanel.find(".collapse").removeClass("in");
      $newPanel.find(".accordion-toggle").attr("href",  "#" + (++hash))
      .text("Dynamic panel #" + hash);
      $newPanel.find(".panel-collapse").attr("id", hash).addClass("collapse").removeClass("in");
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