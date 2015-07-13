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
    $("#noInformation").show()
    $('.btn-success').click(function(){
        var value = $(this).text();
        var subscriptionsId = $(this).attr('id');
        var id = "#divtotext"+ subscriptionsId;
        if(value == 'Edit')
        {
            $(this).text('Save');
            $(id).css({"border":"1px solid #ccc","border-radius":"5px"});
            $(id).attr('contenteditable','true');
            $(id).focus();
        } else {
            var test = $(id).html();
            var Url = [];
            var errorUrl = [];
            $.each((test.split('</div>')), function(){
               try{
                    var urlBody = (($.trim(this).replace(/<div>/g,' ')).replace(/<br>/g,' '));
                    urlBody = $(urlBody).text()
               } catch (err) {
                    var urlBody = ($.trim(this).replace(/<div>/g,' ')).replace(/<br>/g,' ');
               }finally {}
               urlBody = urlBody.replace(/&nbsp;/g, "")
               urlBody = urlBody.replace(/\s/g, "")
               console.log(urlBody+'\n')
                if (!isEmpty(urlBody) && validateURL(urlBody))
                    Url.push((urlBody));
                else
                    if(!isEmpty(urlBody))
                        errorUrl.push(urlBody);  
            });
            $(this).text('Edit');
            $(id).css("border", "0px");
            $(id).attr('contenteditable','false');

            if(errorUrl.length == 0){
                $.ajax({
                    type: 'PUT',
                    url: "/Event/update/"+subscriptionsId+"/Urls",
                    data: {Urls:Url},
                    success: function(result) {
                        if (result == "success"){
                            $('.alert-danger').hide()
                            $('.alert-success').show()
                        } else {
                            $('.alert-success').show()
                            $('.alert-danger').show()
                        }
                    }
                });
            } else {
                var newHTML = [];
                console.log(errorUrl)
                $.each(errorUrl, function(index, value) {
                    newHTML.push('<span>' + value + '</span><br>');
                });
                $('.alert-danger').html('Error in URl : <br>' + newHTML.join(""))
                $('.alert-danger').show()
            }
        }
    });


});