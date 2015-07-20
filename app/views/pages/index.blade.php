@extends('layouts.default')

@section('content')
  <center><h3> Yamsafer Web-hooks </h3></center>
  <div style="text-align:left"> 
    <p>Yamsafer.me ("The Traveller" in Arabic) is a rapidly-growing hotel booking site. We enable Arabs to easily find and book hotels, with or without a credit card.</p>
    <p> Yamsafer Webhooks allow you to build or set up integrations which subscribe to certain events on GitHub.com. When one of those events is triggered, we’ll send a HTTP POST payload to the webhook’s configured URL. Webhooks can be used to update an external issue tracker, trigger CI builds, update a backup mirror, or even deploy to your production server.</p>
  </div> 
@stop