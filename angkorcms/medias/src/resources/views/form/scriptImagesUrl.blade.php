<script>
	$(function(){
		$('.selectImageURL').change(function(){
		var option = $(this).find(":selected");
			displayUrl(this);
		})
	});
	function displayUrl(elem)
	{
		var option = $(elem).find(":selected");
		if(option.attr('url') != ''){
			$(".urlimage").each(function() {
				$( this ).val(option.attr('url'));
				});
		}else{
			$(".urlimage").each(function() {
				$( this ).val('');
				});
		}
	}
	$(".urlimage").on("click", function () {
	   $(this).select();
	});
</script>