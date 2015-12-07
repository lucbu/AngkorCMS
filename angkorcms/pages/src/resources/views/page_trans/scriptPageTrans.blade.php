<script type="text/javascript" src="{{ asset('js/angkorcmspages/jquery.tablednd.js') }}"></script>
<script>
$(function() {
	tablednd();
});
function tablednd(){
	$("#listBlockTable table").each(function() {
		tabledndById($(this).attr("blockId"))
	});
}
function tabledndById(block_id){
   $('#table-block'+block_id).tableDnD({
        onDrop: function(table, row) {
            saveModuleOrder($(table).attr('blockId'));
        },
    });
}
$('#addModule').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: '{{route('angkorcmspagestrans.addModule.ajax')}}',
		type: 'POST',
		data: new FormData(this),
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#formAddModuleError').html('')
				$('#formAddModule .form-group').each(function() {$( this ).removeClass('has-feedback');});
				$('#formAddModule .form-group').each(function() {$( this ).removeClass('has-error');});
				$('#formAddModule .text-danger').each(function() {$( this ).html('');});

				if(data.newTable == 1){
					$('#listBlockTable').append(data.html);
				}else if(data.newTable == 0){
					$('#block'+data.blockTable_id).html(data.html);
				}
				tablednd(data.blockTable_id);
            	saveModuleOrder(data.blockTable_id);
			}else if(data.error){
				$('#formAddModuleError').html(data.error)
				$('#formAddModule').addClass('has-feedback');
				$('#formAddModule').addClass('has-error');
			}
		},
		error: function(xhr, textStatus, errorThrown){
			var errors = xhr.responseJSON;
			for(var error in errors){
				$('#formAddModule .text-danger-'+error).html(errors[error]);
				$('#formAddModule .form-group-'+error).addClass('has-feedback');
				$('#formAddModule .form-group-'+error).addClass('has-error');
			}
		}
	})
});
function delModule(id, action){
	$.ajax({
		url: action,
		type: 'post',
		data: "",
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#ModuleRow'+id).remove();
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
function saveModuleOrder(block_id){
	var listModules = Array();
	$('#table-block'+block_id+' tbody tr').each(function() {listModules.push($(this).attr('idModule'));});
	var formData = {};
	formData['order'] = listModules;
	formData['block_id'] = block_id;
	$.ajax({
		url: '{{ route('angkorcmspagestrans.saveOrder.ajax') }}',
		type: 'post',
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		data: formData,
		success: function(data){
			if(data.ok){
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
</script>