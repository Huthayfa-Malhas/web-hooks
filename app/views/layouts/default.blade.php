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
  <ul class="nav nav-tabs">
    <li id="index" ><a href="index">Home</a></li>
    <li id="subscription" ><a href="subscription">My Events</a></li>
    <li id="subscribe" ><a href="subscribe">Subscribe Event</a></li>
    <li id="webhooks" ><a href="webhooks">Test Web-Hooks</a></li>
  </ul>
  @yield('content')
</div>
</body>
</html>