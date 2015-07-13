$(document).ready(function(e) {


    $.fn.delete = function(id)
    {
        $.ajax({
            type: 'Delete',
            url: "/Event/unsubscribe/"+id,
            success: function(result) {
                location.reload();
            }
        });
    }
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
            if (!isEmpty(urlBody) && validateURL(urlBody))
                Url.push((urlBody));
        });
            $(this).text('Edit');
            $(id).css("border", "0px");
            $(id).attr('contenteditable','false');
            $.ajax({
                type: 'PUT',
                url: "/Event/update/"+eventId+"/Urls",
                data: {Urls:Url}
            });
        }
    });


});