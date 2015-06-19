<script>
	$(function(){
		$('#selectImage').change(function(){
			choiceImage(this);
		})
	});
	function choiceImage(elem)
	{
		var option = $(elem).find(":selected");
		if(option.attr('value') != ''){
			var html = "";
			html+='<div class="col-md-2 col-md-offset-0" id="image'+option.attr('value')+'">';
			html+='<input type="hidden" name="imageSelected[]" value="'+option.attr('value')+'" />';
			html+='<span class="glyphicon glyphicon-remove btn btn-xs" onclick="this.parentNode.remove();"></span>';
			html+='<img src="'+option.attr('url')+'" style="max-height:80px;max-width=80px;" id="'+option.attr('value')+'"/>';
			html+='</div>';
			$("#imagesChoosen").append(html);
		}
	}
</script>