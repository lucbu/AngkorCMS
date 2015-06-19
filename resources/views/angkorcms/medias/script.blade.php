<script>
	$(function(){
		$('#image').change(function(e){
			$('#uploadPicture').submit();
		})
		$('#uploadPicture').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: '{{route('image.store.ajax')}}',
				type: 'POST',
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function(data){
					if(data.ok){
						$('#errorImage').html('')
						$('#divImage').removeClass('has-feedback');
						$('#divImage').removeClass('has-error');
						$('#listImage').append(data.html);

					}else{
						$('#errorImage').html(data.error)
						$('#divImage').addClass('has-feedback');
						$('#divImage').addClass('has-error');
					}
				},
				error: function(xhr, textStatus, errorThrown){
					$('#errorImage').html(xhr.responseJSON.image[0])
					$('#divImage').addClass('has-feedback');
					$('#divImage').addClass('has-error');
				}
			})
		});
		$('#addFolder').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: '{{route('folder.store.ajax')}}',
				type: 'POST',
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function(data){
					if(data.ok){
						$('#errorFolder').html('')
						$('#divFolder').removeClass('has-feedback');
						$('#divFolder').removeClass('has-error');
						$('#listFolder').append(data.html);

					}else{
						$('#errorFolder').html(data.error)
						$('#divFolder').addClass('has-feedback');
						$('#divFolder').addClass('has-error');
					}
				},
				error: function(xhr, textStatus, errorThrown){
					$('#errorFolder').html(xhr.responseJSON.image[0])
					$('#divFolder').addClass('has-feedback');
					$('#divFolder').addClass('has-error');
				}
			})
		});
	});

	function delImage(id){
		if(confirm('Are you sure you want to delete this picture ?')){
			document.getElementById('image_id_form').setAttribute('value',id);
			$.ajax( {
					url: '{{route('image.del.ajax')}}',
					type: 'POST',
					data:  new FormData(document.getElementById('delImage')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data.ok){
							$('#image'+data.id).remove();
						}
					},
					error: function(xhr, textStatus, errorThrown){
						alert("A problem has occured.");
					}
				});
		}
	}
	function delFolder(id){
		if(confirm('Are you sure you want to delete this folder ?')){
			document.getElementById('folder_id_form').setAttribute('value',id);
			$.ajax( {
					url: '{{route('folder.del.ajax')}}',
					type: 'POST',
					data:  new FormData(document.getElementById('delFolder')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data.ok){
							$('#folder'+data.id).remove();
						}
					},
					error: function(xhr, textStatus, errorThrown){
						alert("A problem has occured.");
					}
				});
		}
	}
	function openFolder(id){
			document.getElementById('folder_id_open').setAttribute('value',id);
			$.ajax( {
					url: '{{route('folder.open.ajax')}}',
					type: 'POST',
					data:  new FormData(document.getElementById('openFolder')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data.ok){
							$('#listMedia').html(data.html);
							$(".folder_id_current").each(function( index ) {
								$(this).val(id);
							});
						}else{
							alert("A problem has occured.");
						}
					},
					error: function(xhr, textStatus, errorThrown){
						alert("A problem has occured.");
					}
				});
	}
</script>
