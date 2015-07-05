 @extends('layouts.default')
 @section('content')
 <h3>My Subscription</h3>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                   @for ($i = 0; $i < sizeof($Eventname); $i++)
                      <div class="panel panel-default">
                        <div style=" position: relative;float: right;margin-top: 4px;margin-right: 4px; ">
                                @if ($Events[$i]['active'] == 1 ) 
                                <input type="checkbox" class="EventActive" id="{{ $Eventname[$i][0]['id']}}" checked data-toggle="toggle">
                                @else
                                <input type="checkbox" class="EventActive" id="{{ $Eventname[$i][0]['id']}}" data-toggle="toggle">
                                @endif

                        </div>
                        <div class="panel-heading" role="tab" id="Event{{ $Eventname[$i][0]['id']}}"> 
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#tabEvent{{ $Eventname[$i][0]['id']}}" aria-expanded="false" aria-controls="tabEvent{{ $Eventname[$i][0]['id']}}">
                              {{ $Eventname[$i][0]['name']}}
                            </a>
                          </h4>
                        </div>
                        <div id="tabEvent{{ $Eventname[$i][0]['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Event{{ $Eventname[$i][0]['id']}}">
                          <div class="panel-body">
                                <div style=" position: relative;float: right;">
                                    <button type="button" id='editSave' class="btn btn-success">Edit</button>
                                    <input type="button" class="btn btn-danger" onClick="$(this).delete({{ $Eventname[$i][0]['id']}})" value="Delete">
                                </div>
                                <div style="width: 540px;">
                                    <div id='divtotext' contenteditable>
                                      @for ($j = 0; $j < count($Url[$i]) ; $j++ )
                                        {{ $Url[$i][$j]['callback_url'].'<br>'}}
                                      @endfor
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  @endfor
                </div>
@stop