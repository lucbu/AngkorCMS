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

	function getNameFolder(){
		var nameFolder = prompt("Enter the name of the folder", "");
		document.getElementById('folder').setAttribute('value',nameFolder);
		if(nameFolder == null){
			document.getElementById('folder').setAttribute('value','');
			return false;
		}
	}
	function delImage(id){
		if(confirm('Are you sure you want to delete this picture ?')){
			document.getElementById('image_id_form').setAttribute('value',id);
			$.ajax( {
					url: '{{route('image.delete.ajax')}}',
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
					url: '{{route('folder.delete.ajax')}}',
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
	function putImageFolder(image_id, folder_id){
			document.getElementById('image_id_to_move').setAttribute('value',image_id);
			document.getElementById('image_parent_folder_id').setAttribute('value',folder_id);
			$.ajax( {
					url: '{{route('image.changeFolder.ajax')}}',
					type: 'POST',
					data:  new FormData(document.getElementById('putImageFolder')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data.ok){
							$('#image'+image_id).remove();
						}else{
							alert("A problem has occured.");
						}
					},
					error: function(xhr, textStatus, errorThrown){
						alert("A problem has occured.");
					}
				});
	}
	function putParentFolder(folder_id, parent_folder_id){
			document.getElementById('folder_id_to_move').setAttribute('value',folder_id);
			document.getElementById('folder_id_parent').setAttribute('value',parent_folder_id);
			$.ajax( {
					url: '{{route('folder.changeParent.ajax')}}',
					type: 'POST',
					data:  new FormData(document.getElementById('putFolderParent')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data.ok){
							$('#folder'+folder_id).remove();
						}else{
							alert("A problem has occured.");
						}
					},
					error: function(xhr, textStatus, errorThrown){
						alert("A problem has occured.");
					}
				});
	}
	function startDragImage(ev, image_id){
    	ev.dataTransfer.setData("type_data", 'image');
    	ev.dataTransfer.setData("image_id", image_id);
	}
	function startDragFolder(ev, folder_id){
    	ev.dataTransfer.setData("type_data", 'folder');
    	ev.dataTransfer.setData("folder_id", folder_id);
	}
	function dropOnFolder(ev, folder_id) {
	    ev.preventDefault();
	    var type_data = ev.dataTransfer.getData("type_data");
	    if(type_data == 'image'){
	    	var image_id = ev.dataTransfer.getData("image_id");
	    	putImageFolder(image_id, folder_id);
	    }else if(type_data == 'folder'){
	    	var origin_folder_id = ev.dataTransfer.getData("folder_id");
	    	if(folder_id != origin_folder_id){
	    		putParentFolder(origin_folder_id, folder_id);
	    	}
	    }
    }
    function allowDrop(event) {
    	event.preventDefault();
    }
</script>
