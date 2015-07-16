 @extends('layouts.default')
 @section('content')
 <h3>My Subscriptions</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  @foreach ( $eventInformation as $event)
                      <div class="panel panel-default">
                        <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">
                                @if ($event['active'] == 1 ) 
                                <input type="checkbox" class="EventActive" id="{{ $event['subscriptionsId']}}" checked data-toggle="toggle">
                                @else
                                <input type="checkbox" class="EventActive" id="{{ $event['subscriptionsId']}}" data-toggle="toggle">
                                @endif

                        </div>
                        <div class="panel-heading" role="tab" id="Event{{ $event['event']['id']}}"> 
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $event['event']['id']}}" aria-expanded="false" aria-controls="tabEvent{{ $event['event']['id']}}">
                              {{ $event['event']['name']}}
                            </a>
                          </h4>
                        </div>
                        <div id="tabEvent{{ $event['event']['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $event['event']['id']}}">
                          <div class="panel-body">
                                <div style=" position: relative;float: right;">
                                    <button type="button" id="{{$event['event']['id']}}" class="btn btn-success">Edit</button>
                                    <input type="button" class="btn btn-danger" onClick="$(this).delete({{ $event['subscriptionsId']}})" value="Delete">
                                </div>
                                <div style="width: 535px;">
                                    <div class='divtotext' style='padding:4px 4px 1px 14px' id="divtotext{{$event['event']['id']}}" contenteditable='false'>
                                        @foreach ( $event['urls'] as $value)
                                        {{  $value['callback_url'].'<br>' }}
                                        @endforeach
                                    </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  @endforeach
                </div>
@stop