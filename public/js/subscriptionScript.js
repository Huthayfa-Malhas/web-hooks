
$(document).ready(function(e) {

    $("#subscribeButton").click(function() {

        var allemptylength=$(".form-control").filter(function() {
            return isEmpty(this.value.length);
        })
        console.log(allemptylength.length)
        var fieldsNumber =  $('input[name="textUrl"]').length - allemptylength.length
        var validfieldsNumber =  $('.glyphicon-ok').length
        var eventID = $( "#eventSelected option:selected" ).val();
        Url = []
        console.log("fields# :"+fieldsNumber+ ' validfields# : '+validfieldsNumber)
        if((fieldsNumber == validfieldsNumber) && (fieldsNumber != 0) && (validfieldsNumber != 0) ) {
            $(".form-control").each(function() {
                var urlBody = $(this).val();
                if(validateURL(urlBody))
                    Url.push(urlBody);
            });
            $.post("/subscribe", {eventID: eventID, Url:Url}, function(result)
            {
                if ('success' == result) {
                    alert("Event Add Successfully")
                    location.reload();
                }
            });
        }
    });


    $(document).on('click',".input-group-addon", (function () {
        var value = $("#textbox" + $(this).attr('id')).val()
        if(!isEmpty(value)){
            var confirmation = confirm("Are you sure you want to delete this textbox?");
            if (confirmation == true) {
                $("#TextBoxDiv"+$(this).attr('id')).remove();
            } else {
                return; 
            }
        }else {
            $("#TextBoxDiv"+$(this).attr('id')).remove();
        }
    }));

    $(document).on('focusout',".form-control", (function () {
        var Id= "#TextBoxDiv"+ ($(this).attr('id')).match(/\d+/);
        var check= ".check"+ ($(this).attr('id')).match(/\d+/);
        var urlBody = $("#textbox"+ ($(this).attr('id')).match(/\d+/)).val();
        if(validateURL(urlBody)){
            $(check).html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>')
            $(Id).removeClass('form-group has-error').addClass('form-group has-success')
        } else {
            $(check).html('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>')
            $(Id).removeClass('form-group has-success').addClass('form-group has-error')
        }
    }));
    
    var counter = 2
    $("#addButton").click(function () {
        var newTextBoxDiv = $(document.createElement('div')).attr({"id":'TextBoxDiv' + counter, "class":"form-group " });
        newTextBoxDiv.after().html(
            '<div class="input-group"><div title=" Url validation" class="input-group-addon check'+counter+'"><span class="glyphicon glyphicon-minus" style="color:#eee" aria-hidden="true"></span></div><input type="text" class="form-control" name="textUrl" placeholder="Enter url" name="textbox' + counter + 
            '" id="textbox' + counter + '"  >'
            +'<a class="input-group-addon"style="cursor:pointer" id="'+counter+'"><span class="glyphicon glyphicon-remove-circle" title="Delete this field" style="font-size: 18px;" aria-hidden="true"></span></a></div>');
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        counter++;
    });






});
