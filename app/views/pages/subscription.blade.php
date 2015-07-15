 @extends('layouts.default')
 @section('content')
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

