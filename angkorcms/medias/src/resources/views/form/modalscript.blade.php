<script>
	$('#listMedia').on("click", ".image", function(e){
		e.preventDefault();
		var url = $(this).find('a').attr('href');
		$(".urlimage").each(function() {
			$( this ).val(url);
		});
		$('#graphicalviewimageurl').modal('hide')
	});
</script>