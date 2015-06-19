<script type="text/javascript" src="{{ asset('js/angkorcmspages/jquery.tablednd.js') }}"></script>
<script>
$(function() {
	tablednd();
});
function tablednd(){
    $("#groupModules").tableDnD({
        onDrop: function(table, row) {
            saveModuleOrder();
        },
    });
}
$('#addModule').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: '{{route('angkorcmsgroupsmodules.addModule.ajax')}}',
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
				$('#groupModules').append(data.html);
				tablednd();saveModuleOrder();
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
function saveModuleOrder(){
	var groupModules = Array();
	$('#groupModules tbody tr').each(function() {groupModules.push($(this).attr('idModule'));});
	var formData = {};
	formData['order'] = groupModules;
	formData['groupmodule_id'] = $('#groupModules').attr('idGroupModules');
	$.ajax({
		url: '{{ route('angkorcmsgroupsmodules.saveOrder.ajax') }}',
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