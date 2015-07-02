 
$(document).ready(function(e) {
    function validateURL(textval)
    {
        var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
        return urlregex.test(textval);
    }
    $.fn.delete = function(id) {
        var eventId = id;
        $.post("/delete", {eventId: eventId, }, function(result){
            location.reload();
        });
    };
    $(".EventActive").change(function(e){
            var active;
            if (this.checked){
                active = 1;
            } else {
                active = 0;
            } 
            var eventId = $(this).attr('id');
            $.post("/active", {eventId: eventId, active:active}, function(result){
          //          alert(result);
            });
    });
    $("#getEvents").click(function() {
        $.get("/getEvent",null,function(result){

            $("#myTab li:eq(1) a").tab('show');       
        })
    });
    $("#fireEvent").click(function(){
        var eventId = $( "#selectFire option:selected" ).val();
        var payload = $("textarea#payload").val();
        $.post("/fireEent",{eventId: eventId, payload: payload},function(result){
            alert(result)
        });

 
    });

    $("#subscribeButton").click(function() {

        var flag = 0;
        var Urls = $("textarea#UrlArea").val();
        var Url = Urls.split('\n');
        var eventID = $( "#eventSelected option:selected" ).val();
        for (var i = 0; Url.length > i; i++) {
            if( !validateURL(Url[i]) ){
                $('#textareaError').addClass("form-group has-error");
                flag = 0;
              break; 
            } else {
                flag = 1; 
            }
        }
        if(flag == 1) {
            $.post("/subscribe", {eventID: eventID, Url:Url}, function(result)
            {
                if (result) 
                {
                   location.reload();
                    alert(result);
                } else {
                    alert('Error')
                }
            });
        }
    });
});