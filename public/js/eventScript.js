$(document).ready(function(e) {

	$('#selectFire').change(function(){
        var eventId = $( "#selectFire option:selected" ).val();
        $.get("/Event/" + eventId + "/Urls", null, function(result){
            if(result == ''){
                $('#eventUrls').hide()
            }else{
                for (var i = result.length - 1; i >= 0; i--) {
                    result[i] = result[i] +'<br>' 
                };
                $('#eventUrls').html(result);
                $('#eventUrls').show()
            }
         });
    });

    $("#fireEvent").click(function(){
        var eventId = $( "#selectFire option:selected" ).val();
        var payload = $("textarea#payload").val();
        $.post("/fireEent",{eventId: eventId, payload: payload},function(result){
            alert(result)
        });
    });

  $('#eventDescription').hide()
    $('#eventUrls').hide()
    $('.alert-info').hide()

    $(".EventActive").change(function(e){
            var active;
            if (this.checked){
                active = 1;
            } else {
                active = 0;
            } 
            var subscriptionsId = $(this).attr('id');
            $.post("/subscriptions/active/"+subscriptionsId, {active:active}, function(result){});

    });
    


    $("#eventSelected").change(function(){
        var eventId = $( "#eventSelected option:selected" ).val();
            $('.alert-info').hide()
            var id = '#'+eventId;
            $(id).show()
    });
    


});