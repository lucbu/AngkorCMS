<script>
	$(function(){
		$("#selectImage option[value='{{$image_id}}']").prop("selected", true);

		choiceImage($('#selectImage'));

		$('#selectImage').change(function(){
			choiceImage(this);
		})
	});
	function choiceImage(elem)
	{
		var option = $(elem).find(":selected");
		$("#image_id").val(option.attr('value'))
		if(option.attr('value') != ''){
			$("#imageChosed").html('<img style="max-height:80px;max-width=80px;" src="'+option.attr('url')+'" id="image'+option.attr('value')+'" style=/>');
		}else{
			$("#imageChosed").html('');
		}
	}
	$('#listMedia').on("click", ".image", function(e){
		e.preventDefault();

		var id = $(this).attr('image-id');
		$("#image_id").val(id);

		var url = $(this).find('a').attr('href');
		$("#imageChosed").html('<img style="max-height:80px;max-width=80px;" src="'+url+'" id="image'+id+'" style=/>');

		$('#graphicalviewimageurl').modal('hide')
	});
</script>