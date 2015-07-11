$(document).ready(function(e) {

$("#subscribeButton").click(function() {

        var flag = 0;
        var Urls = $("textarea#UrlArea").val();
        var Urls = Urls.split('\n');
        var Url = []
        var eventID = $( "#eventSelected option:selected" ).val();
        for (var i = 0; Urls.length > i; i++) {
        	var urlBody = Urls[i].replace(/ /g,'')
            if( !validateURL(urlBody)){
            	console.log(urlBody)
                $( "#eventSelected").addClass("form-group has-error");
                $('#textareaError').addClass("form-group has-error");
                flag = 0;
              break; 
            } else {
            	Url.push(urlBody)
                flag = 1; 
            }
        }
        console.log(Url)

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
