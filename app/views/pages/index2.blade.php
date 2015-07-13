@extends('layouts.default')


@section('content')

<style type="text/css">
	
	#TextBoxesGroup{
		width: 600px;
	}
</style>

</head>
<br> <br> <br> 
<script type="text/javascript">
	
	$(document).ready(function(){
		

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
		}))
		$('#getUrl').click(function(){
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
		
		var counter = 2
		$("#addButton").click(function () {
			
			var newTextBoxDiv = $(document.createElement('div')).attr({"id":'TextBoxDiv' + counter, "class":"form-group " });
			
			newTextBoxDiv.after().html(
				'<div class="input-group"><input type="text" class="form-control" placeholder="Enter url" name="textbox' + counter + 
				'" id="textbox' + counter + '"  >'
				+'<a class="input-group-addon" id="'+counter+'">x</a></div>');

			
			newTextBoxDiv.appendTo("#TextBoxesGroup");
			counter++;
		});
		

		
	});
</script>

</head><body>
<input type='button' class="btn btn-primary btn-lg btn-block" value='Add new Url' id='addButton'> 
<br/>

<div id='TextBoxesGroup'>
	<div id="TextBoxDiv1" class="form-group">
		<div  class="input-group">
			<input type='text' class="form-control"  placeholder="Enter url" id='textbox1' >
			<span class="input-group-addon" id='1' >x</span>
		</div>
	</div>
</div>
<input type='button' class="btn btn-primary btn-lg btn-block" value='Get Url' id='getUrl'> 

</body>
</html>

@stop