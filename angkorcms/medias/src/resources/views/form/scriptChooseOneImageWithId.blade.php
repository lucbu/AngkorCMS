<script>
	$(function(){
		$("#selectImage{{$id}} option[value='{{$image_id}}']").prop("selected", true);

		choiceImage{{$id}}($('#selectImage{{$id}}'));

		$('#selectImage{{$id}}').change(function(){
			choiceImage{{$id}}(this);
		})
	});
	function choiceImage{{$id}}(elem)
	{
		var option = $(elem).find(":selected");
		$("#image_id{{$id}}").val(option.attr('value'))
		if(option.attr('value') != ''){
			$("#imageChosed{{$id}}").html('<img style="max-height:80px;max-width=80px;" src="'+option.attr('url')+'" id="image'+option.attr('value')+'" style=/>');
		}else{
			$("#imageChosed{{$id}}").html('');
		}
	}
</script>