<!DOCTYPE html>
<html lang="en" style="width: 700px; margin: 0 auto;">
  <head>
    <meta charset="UTF-8">
    <title>Yamsafer webhooks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <script src="js/myScript.js"></script>
    <script src="js/eventScript.js"></script>
    <script src="js/userScript.js"></script>
    <script src="js/subscriptionScript.js"></script>
    <a href='/' style="text-decoration: none; color:#337ab7">
      <img  src='images/Yamsafer_logo.png'/>
      <h1 style="font-family: Chiller; margin: -39px 0px 45px 205px;  font-size: 53px;">
        WebHooks
      </h1>
    </a>
  </head>
  <body>
    <ul class="nav nav-tabs">
      <li id="index" ><a href="/">Home</a></li>
      <li id="subscription" ><a href="subscription">My Subscriptions</a></li>
      <li id="subscriptions" ><a href="subscriptions">Subscribe Event</a></li>
      <li id="webhooks" ><a href="webhooks">Test Web-Hooks</a></li>
    </ul>
    @yield('content')
  </div>
  </body>
</html>