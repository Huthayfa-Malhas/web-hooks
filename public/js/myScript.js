 
$(document).ready(function(e) {

    $(function() {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        if(pgurl==''){
            pgurl='index'
        }
        $("#"+pgurl).addClass("active");
    });
    
    function isEmpty(str)
    {
        return ((!str || 0 === str.length) || (!str || /^\s*$/.test(str)));
    }
    
    function validateURL(url)
    {
        return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
    }

    $.fn.delete = function(id)
    {
        var eventId = id;
        $.post("/unsubscribe", {eventId: eventId, }, function(result){
            location.reload();
        });
    };

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
            var eventId = $(this).attr('id');
            $.post("/active", {eventId: eventId, active:active}, function(result){});
    });
    $('#selectFire').change(function(){
        var eventId = $( "#selectFire option:selected" ).val();
        $.get("/getUrls",{eventId: eventId},function(result){
            if(result == ''){
                $('#eventUrls').hide()
            }else{
                $('#eventUrls').show()
                $('#eventUrls').html(result);
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

    $("#eventSelected").change(function(){
        var eventId = $( "#eventSelected option:selected" ).val();
            $('.alert-info').hide()
            var id = '#'+eventId;
            $(id).show()
    });
    $("#subscribeButton").click(function() {

        var flag = 0;
        var Urls = $("textarea#UrlArea").val();
        var Url = Urls.split('\n');
        var eventID = $( "#eventSelected option:selected" ).val();
        for (var i = 0; Url.length > i; i++) {
            if( !validateURL(Url[i]) ){
                $( "#eventSelected").addClass("form-group has-error");
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

    $('.btn-success').click(function(){
        var value = $(this).text();
        var eventId = $(this).attr('id');
        var id = "#divtotext"+ eventId;
        if(value == 'Edit')
        {
            $(this).text('Save');
            $(id).css({"border":"1px solid #ccc","border-radius":"5px"});
            $(id).attr('contenteditable','true');
            $(id).focus();
        } else {
            var test = $(id).html();
            var Url = [];
            $.each((test.split('</div>')), function(){
               try{
                    var urlBody = (($.trim(this).replace(/<div>/g,' ')).replace(/<br>/g,' '));
                    urlBody = $(urlBody).text()
               } catch (err) {
                    var urlBody = ($.trim(this).replace(/<div>/g,' ')).replace(/<br>/g,' ');
               }finally {}
               urlBody = urlBody.replace(/&nbsp;/g, "")
               urlBody = urlBody.replace(/\s/g, "")
               console.log(urlBody)
                if (!isEmpty(urlBody) && validateURL(urlBody))
                    Url.push((urlBody));
            });
            console.log(Url)
            $(this).text('Edit');
            $(id).css("border", "0px");
            $(id).attr('contenteditable','false');
            $.post("/update",{eventId: eventId, Urls:Url});
        }
    });

});