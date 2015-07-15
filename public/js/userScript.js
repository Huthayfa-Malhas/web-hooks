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
        var res = "#tabEvent"+eventId;
        var panel= $(res);
        var inputs = panel.find("input");
      

        if(value == 'Edit')
        {
            $(this).text('Save');
            inputs.each(function(){
            $(this).attr('readonly', false);
;
        });  

        } else {
            $(this).text('Edit');
            Url = []
            inputs.each(function(){
                var urlBody =$(this).val();
               if(isEmpty(urlBody))
               $('#TextBoxDiv1').remove() 
                if(validateURL(urlBody))
                    Url.push(urlBody)

                $(this).attr('readonly', true);
            });
            console.log(Url)
            /*
             $.ajax({
                type: 'PUT',
                url: "/Event/update/"+eventId+"/Urls",
                data: {Urls:Url}
            });*/
        }
    });


});