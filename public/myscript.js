


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



