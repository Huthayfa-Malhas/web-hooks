 @extends('layouts.default')
 @section('content')
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
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $event['eventId']}}" aria-expanded="false" aria-controls="tabEvent{{ $event['eventId']}}">
                              {{ $event['eventName']}}
                            </a>
                          </h4>
                        </div>
                        <div id="tabEvent{{ $event['eventId']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $event['eventId']}}">
                          <div class="panel-body">
                                <div style=" position: relative;float: right;">
                                    <button type="button" id="{{$event['eventId']}}" class="btn btn-success">Edit</button>
                                    <input type="button" class="btn btn-danger" onClick="$(this).delete({{ $event['subscriptionsId']}})" value="Delete">
                                </div>
                                <div style="width: 535px;">
                                    <div class='divtotext' style='padding:4px 4px 1px 14px' id="divtotext{{$event['eventId']}}" contenteditable='false'>
                                        @foreach ( $event['urls']['callback_url'] as $value)
                                        {{  $value.'<br>' }}
                                        @endforeach
                                    </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  @endforeach
                </div>
@stop