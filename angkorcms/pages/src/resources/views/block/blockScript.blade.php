
<script>
$('#addBlock').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: '{{route('angkorcmsblocks.addBlock.ajax')}}',
		type: 'POST',
		data: new FormData(this),
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#formAddBlockError').html('')
				$('#formAddBlock .form-group').each(function() {$( this ).removeClass('has-feedback');});
				$('#formAddBlock .form-group').each(function() {$( this ).removeClass('has-error');});
				$('#formAddBlock .text-danger').each(function() {$( this ).html('');});
				$('#listBlock').append(data.html);
			}else if(data.error){
				$('#formAddBlockError').html(data.error)
				$('#formAddBlock').addClass('has-feedback');
				$('#formAddBlock').addClass('has-error');
			}
		},
		error: function(xhr, textStatus, errorThrown){
			var errors = xhr.responseJSON;
			for(var error in errors){
				$('#formAddBlock .text-danger-'+error).html(errors[error]);
				$('#formAddBlock .form-group-'+error).addClass('has-feedback');
				$('#formAddBlock .form-group-'+error).addClass('has-error');
			}
		}
	})
});
function delBlock(id,action){
	$.ajax({
		url: action,
		type: 'post',
		data: '',
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#block'+id).remove();
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
</script>