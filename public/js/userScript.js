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
<<<<<<< HEAD
        var subscriptionsId = $(this).attr('id');
        var id = "#divtotext"+ subscriptionsId;
=======
        var eventId = $(this).attr('id');
        var res = "#tabEvent"+eventId;
        var panel= $(res);
        var inputs = panel.find("input");
        console.log(inputs);
      
>>>>>>> 9ec1550cee89810d355d28334cc2ae83b9a9b602

        if(value == 'Edit')
        {
            $(this).text('Save');
            inputs.each(function(){
            $(this).attr('readonly', false);
;
        });  

        } else {
<<<<<<< HEAD
            var test = $(id).html();
            var Url = [];
            var errorUrl = [];

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
=======
            $(this).text('Edit');
            Url = []
            inputs.each(function(){
                var urlBody =$(this).val();
               if(isEmpty(urlBody))
                $(this).remove() 
                else
                    $(this).val(urlBody);
                if(validateURL(urlBody))
                    Url.push(urlBody)
                $(this).attr('readonly', true);
            });
            console.log(Url)
            console.log(eventId)
             $.ajax({
                type: 'PUT',
                url: "/Event/update/"+eventId+"/Urls",
                data: {Urls:Url},
                success: function(result) {
                }
            });
>>>>>>> 9ec1550cee89810d355d28334cc2ae83b9a9b602
        }
    });


});