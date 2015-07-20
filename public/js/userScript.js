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
        console.log("panel", panel, res);
        var inputs = panel.find("input");
        console.log(inputs.length);


        if(value == 'Edit')
        {
            console.log("edittttt",$(this).parents('.panel-body').first().find('.addEventUrl'));
            $(this).text('Save');
            $(this).parents('.panel-body').first().find('.addEventUrl').show();

            $(this).parents('.panel-body').first().find('.delete').css('visibility', 'visible');
            console.log(inputs);
            inputs.each(function(){
                $(this).attr('readonly', false);

            });  

        } else {
            console.log("elseeee");
            $('.delete').css('visibility', 'hidden');
            $('.addEventUrl').hide()
            $(this).text('Edit');
            Url = []
            inputs.each(function(){
                var urlBody =$(this).val();
                var id = ($(this).attr('id')).match(/\d+/)
                console.log(id)
                if(isEmpty(urlBody))
                    $('#TextBoxDiv'+id).remove() 
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
        }
    });

$(document).ready(function(){

    $('.addEventUrl').hide()

    $(document).on('click',".delete", (function () 
    {
      var id = $(this).attr('id')
      var value = $('#textbox'+ id).val()
      if(!isEmpty(value)){
        var confirmation = confirm("Are you sure you want to delete this textbox?");
        if (confirmation == true)
        {
          $('#TextBoxDiv'+id).remove();
      } else {
          return; 
      }
  } else {
      $('#TextBoxDiv'+id).remove();
  }
}))

    $(document).on('click','#getUrl',function(){
      var Url = []
      $(".form-control").each(function() {
        var urlBody = $(this).val();
        var Id= "#TextBoxDiv"+ ($(this).attr('id')).slice(-1);
        if(validateURL(urlBody)){
          $(Id).removeClass('form-group has-error').addClass('form-group has-success')
          Url.push(urlBody);
      } else
      $(Id).removeClass('form-group has-success').addClass('form-group has-error')
  });
      console.log(Url)
  });
    var counter = 100;


    
    $(document).on('click','.addEventUrl', function () {
      console.log("clicked!");
      var addButton = $(this);
      var newTextBoxDiv = $(document.createElement('div'))
      .attr("class", 'form-control' + counter);
      addButton.before('<div id="TextBoxDiv'+counter+'" class="form-group"><div  class="input-group"><input type="text" class="form-control" placeholder="Enter url" id="textbox'+counter+'" ><span class="input-group-addon delete"  style="cursor:pointer;" id="'+counter+ '" >x</span></div>');
      counter++;
  });



}); 

});